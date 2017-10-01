<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

use Tymon\JWTAuth\JWTAuth;

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
                ->where('sent_at',NULL)
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
    
    
    
}
