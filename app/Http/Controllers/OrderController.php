<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
        echo 'Welcome in OrderController :)';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    ////// API
    {
        
        // list all items for client
        
        $items = new Item;

       $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
       
       //add new order record in db 
       
       $order = new Order;
        
        $order->user_id = 1; //////////////////////from session
       
       $order->review = 0;
        
        $order->save();
       
        ////test API 
        
       $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
       
        
        $returnArray = [$items, $order]; 
        return json_encode($returnArray);
       
    }
    
    
    
    public function addItem($orderId,$itemId)       ////// API
    {
        
        $order_item = new Order_item;
        
        $order_item->user_id = 1;          ///////should come from session
       
        $order_item->order_id = $orderId;
        
//        $quantity = Input::get('itemQuantity');
        
        $order_item->quantity = 4;     //////// should come from view
        $order_item->total_item_price = 400;     //////// should be calculated

        $order_item->save();
        
        $items = new Item;
        $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
       
        $returnArray = [$items, $orderId]; 
        return json_encode($returnArray);
        
         //test API 
        
//        return view('item.clientShow',  compact('items','orderId'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()             ////// API
    {
//         $order = new Order;
//        
//        $order = Order::find($orderId)->first();
//        $order->user_id = 1; //////////////////////from session
//       
//       $order->review = 0;
//        
//        $order->save();
        
        $notifications = "make admin notification"; 
        
        $returnArray = [$notifications]; 
        return json_encode($returnArray);
//        return view('/item',compact('notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function review()
    {
        //// show only orders with review = 0
        
        $orders = new Order;
        $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('review',0)->get([
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
//        return "review";
    }
    
    
    public function show()
    {
        $orders = new Order;
        $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('sent_at',null)->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        
   
        return view('order.show',  compact('orders'));
//        return $orders;
    }

    
    public function detail($id)
    {
        $orderItems = new Item;

        $orderItems = Order_item::query()
                ->leftjoin('items as i','item_id','=','i.id')
                ->where("order_id","$id")
                ->get([
                    'order_items.*',
                    'i.name as item_name'
                ]);

        
        return view('order.detail',  compact('orderItems'));
//        return $orderItems[0];
    }
 
    
       public function sent($id)
       {
           $order = Order::find($id);
           $order->review = 1; // as if admin doesn't reviewed order from notifications
           $order->sent_at = new DateTime;
           $order->updated_at = new DateTime;
           $order->save();
           
           $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('sent_at',null)->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        
   
        return view('order.show',  compact('orders'));
//        return $orders;
       }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        $orders = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('sent_at',null)->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        
        $order = Order::query()
                ->leftjoin('users as u','user_id', '=', 'u.id')
                ->where('sent_at',null)->get([
                    'orders.*', 
                    'u.username as client_name'])
                ->sortByDesc("created_at");
        return [$orders, $order];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
