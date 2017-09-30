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
    
    public function addToChart($itemID,JWTAuth $jwtAuth,Request $request)
    {
          $user = $jwtAuth->toUser($jwtAuth->getToken());
          
          
          
        
        
        
    }
    
    public function userHasUnsentOrder($userID)
    {
        $unsentOrder = Order::query()
                ->where('user_id',$userID)
                ->where('sent_at',NULL)
                ->get();
        
        return $unsentOrder;
    }
    
    
}
