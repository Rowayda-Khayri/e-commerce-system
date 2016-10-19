<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
//        $category = new Category;
//
//        $category ->name = 'my newwwww cat';
//
//        $category->save();
////       
//        
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $category = new Category;

        $category->name = $request->categoryName;

        $category->save();
        
        return view('category.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
//        $categories= DB::table('categories')->get();
        
        $categories= Category::all();
        return view('category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category= Category::find($id);
        
//        $category->name = $req
//
//        $category->save();
        
        
        
        
        return view('category.edit', compact('category'));
    
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
        $category= Category::find($id);
        
        $category->name = $request->categoryName;

        $category->save();
        
        $categories= Category::all();
        return view('category.show', compact('categories'));
//        return view('category.add');
//        return 'hi' ;
    }
//
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
