<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

use Tymon\JWTAuth\JWTAuth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Item;
use App\Category;
use App\Subcategory;
use App\User;
use App\Order;
use App\Order_item;

use DB;
use DateTime;

class OrderController extends Controller
{
    
    
    private $user;
    private $jwtauth;
    
    public function __construct(User $user, JWTAuth $jwtauth)
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the login method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth', ['except' => [
           
           'ListAllOrders',
           'details',
           'shipped',
           'review',
           
           ]]);
       
       $this->user = $user;
       $this->jwtauth = $jwtauth;
   }
   
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode('Welcome in OrderController :)'); 
    }

    public function listAllItems()
    {
        $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
         
         
        header('Content-Type: application/json', true);
  
        $json = response::json([
            "items"=> $items,
           
        ])->getContent();
        
        return stripslashes($json);
        
    }
    
    public function addToCart($itemID,JWTAuth $jwtAuth,Request $request)
    {
        
        // create the validation rules ------------------------
        $rules = array(                    
            
            'quantity' => 'required|numeric',
            
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);


        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator

            $errors = $validator->errors();

            $errorsJSON =$errors->toJson();

            return $errorsJSON;

        } else {
            // validation successful ---------------------------

            
        $user = $jwtAuth->toUser($jwtAuth->getToken());
          
          $userID = $user->id;
          
          //check whether user has unsent order or not 
          
          $unsentOrder = $this->userHasUnsentOrder($userID);
          
//          dd($unsentOrder);
          if($unsentOrder){ //user has unsent order.. so, add items to it 
              
              $orderItems = new Order_item();
              $orderItems->order_id = $unsentOrder->id;
              $orderItems->item_id = $itemID;
              $orderItems->quantity = $request->quantity;
              
              $itemPrice = Item::query()
                  ->where('items.id',$itemID)
                  ->get(['items.price'])
                  ->first();
              
              
              
              $orderItems->total_item_price = $orderItems->quantity * $itemPrice->price ;
//              
              $orderItems->save();
              
                header('Content-Type: application/json', true);

                $json = response::json("item has been added to your cart")->getContent();

                return stripslashes($json);
              
          }  else {  //user hasn't any unsent orders
              
              $newOrder = $this->createNewOrder($userID);
              
              $newOrderItems = new Order_item();
              
              $newOrderItems ->order_id = $newOrder->id;
              $newOrderItems ->item_id = $itemID;
              $newOrderItems ->quantity = $request->quantity;
              
              $itemPrice = Item::query()
                  ->where('items.id',$itemID)
                  ->get(['items.price'])
                  ->first();
              
              $newOrderItems ->total_item_price = $newOrderItems ->quantity * $itemPrice->price ;
              
              $newOrderItems ->save();
              
              
              
          }
          
        
                header('Content-Type: application/json', true);

                $json = response::json("item has been added to your cart")->getContent();

                return stripslashes($json);
            
        }
        
      
    }
    
    public function userHasUnsentOrder($userID) 
    // to decide whether I'll create new order instance or add to the unsent one 
    {
        $unsentOrder = Order::query()
                ->where('user_id',$userID)
                ->where('ordered_at',NULL)
                ->get()
                ->first();
        
        return $unsentOrder;
    }
    
    public function createNewOrder($userID)
    {
        
          $order = new Order();

          $order->user_id = $userID;
          $order->save();

          return $order;
    }
    
    
    public function sendOrder(JWTAuth $jwtAuth)
    {
        
        $user = $jwtAuth->toUser($jwtAuth->getToken());
          
        $userID = $user->id;
          
        //get the order object 
        
        $order = Order::query()
                ->where('user_id',$userID)
                ->orderBy('created_at','Desc')
                ->first();
//        dd($order);

        
        //calculate total order price 
        
        $totalOrderPrice = Order_item::query()
                ->where('order_id',$order->id)
                ->sum('total_item_price');
        
//        dd($totalOrderPrice);
        
        $order->total_order_price = $totalOrderPrice;
        $order->ordered_at = new DateTime();
        $order->save();
        
        
        header('Content-Type: application/json', true);

                $json = response::json("your order is waiting for admin review ")->getContent();

                return stripslashes($json);
        
        
    }
    
    public function ListAllOrders()
    {
        $orders = new Order;
        $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('ordered_at',!null)
                ->where('shipped_at',null)
                ->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        
   
        return view('order.show',  compact('orders'));

    }
    
    public function details($id)
    {
        $orderItems = new Item;

        $orderItems = Order_item::query()
                ->leftjoin('items as i','item_id','=','i.id')
                ->where("order_id","$id")
                ->get([
                    'order_items.*',
                    'i.name as item_name'
                ]);

        
        return view('order.details',  compact('orderItems'));
//        return $orderItems[0];
    }
    
    public function shipped($id)
       {
           $order = Order::find($id);
           $order->review = 1; // as if admin doesn't reviewed order from notifications
           $order->shipped_at = new DateTime;
           $order->updated_at = new DateTime;
           $order->save();
           
           $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('shipped_at',null)->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        
   
        return view('order.show',  compact('orders'));
       }
       

       public function review()
    {
        //// show only orders with review = 0
        
        $orders = new Order;
        $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('review',0)
                ->where('ordered_at',!null)
                ->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        
        //// set all orders review = 1
        
        
        $allOrders= Order::all();
         
        foreach ($allOrders as $order){
            
        $order->review = 1;
       
        $order->updated_at = new DateTime;
        $order->save();
        }
        
        return view('order.show',  compact('orders'));
        
    }
    
}
