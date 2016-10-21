<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\Subcategory;

use App\Http\Requests;
use DB;
use DateTime;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Welcome in ItemController :)';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $subcategories = new Subcategory;
        $subcategories = Subcategory::all();
        
        
        return view('item.add',  compact('subcategories'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        
        $item->name = $request->itemName;
        $item->price = $request->itemPrice;
        
        $itemSubcategoryRecord = new Subcategory;
        $itemSubcategoryRecord = Subcategory::where("name","$request->itemSubcategory")->first();
        $item->subcategory_id = $itemSubcategoryRecord->id;
        
//        $item->subcategory_id = $request->itemSubcategory;
       
        $item->save();
       
        $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
        
        return view('item/show', compact('items'));
//        return $itemSubcategoryRecord->id;  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $items = new Item;
//       $items = Item::all()->sortByDesc("created_at");
       
       $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
       
       
        
        
//        $subcategory= Subcategory::where('id','$item->subcategory_id');->first();
//
//        return $subcategory;

        return view('item.show',  compact('items'));
//        return $items;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $item = new Item;
        $item = Item::query()
        ->leftjoin('subcategories as s','subcategory_id', '=', 's.id')
        ->where("items.id", "=", "$id")->get([
            'items.*', 
            's.name as subcategory_name'])
               ;
        $myItem = $item[0];
        $subcategories = new Subcategory;
        $subcategories = Subcategory::all();
       
       
        return view('item.edit', compact('myItem','subcategories'));
//        return $myItem;
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
        
        $item= Item::find($id);
        
        $sub = $request['itemSubcategory'];
        $subcategory = Subcategory::where("name","$sub")->first();
        
             
        $item->name = $request->itemName;
        $item->price = $request->itemPrice;
        $item->subcategory_id = $subcategory->id;
        $item->updated_at = new DateTime;
        $item->save();
        
        
        $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
        return view('item.show',  compact('items'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $item= Item::find($id);
        
        $item->deleted_at = new DateTime();
        
        $item->save();
        $item->delete();
        

        $items = Item::query()
        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
        ->leftjoin('categories as c','c.id', '=', 's.category_id')
        ->get([
            'items.*', 
            's.name as subcategory_name',
            'c.name as category_name'            
        ])->sortByDesc("created_at");
        return view('item.show',  compact('items'));
//        return $items[0]->id;
    }
}
