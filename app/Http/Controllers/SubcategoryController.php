<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Subcategory;
use App\Category;

use DB;
use DateTime;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Welcome in SubcategoryController :)';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $subcategory= new Subcategory;
        $subcategory->category_id = $id;
//        
        return view('subcategory.add',compact('subcategory'));
//        return 'hello sub add';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
//        
        $subcategory= new Subcategory;
//        
        $subcategory->name = $request->subcategoryName;
        $subcategory->category_id = $id;
//        
//
        $subcategory->save();
        
//        $subcategories= Subcategory::all();
        $category = new Category;
        $category= Category::find($id);
        return view('category.edit',compact('category'));
        
//        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory= SubCategory::find($id);
        

        return view('subcategory.edit', compact('subcategory'));
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
        $subcategory= Subcategory::find($id);
        
        $subcategory->name = $request->subcategoryName;
        $subcategory->updated_at = new DateTime;
        $subcategory->save();
        
        $category = new Category;
        $category= Category::find($subcategory->category_id);
        return view('category.edit',compact('category'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory= Subcategory::find($id);
        
        $subcategory->deleted_at = new DateTime();
        
        $subcategory->save();
        $subcategory->delete();
        
//        return back();
          $category = new Category;
        $category= Category::find($subcategory->category_id);
        return view('category.edit', compact('category'));
    }
}
