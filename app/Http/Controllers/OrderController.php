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
    public function create()
    {
        echo 'create order :)';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        //////
        
        $notifications = "notifications";
        
        return view('welcome',compact('notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
           $order->review = 1;
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
    public function edit($id)
    {
        //
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
