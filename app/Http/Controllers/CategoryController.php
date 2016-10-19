<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Subcategory;

use DB;
use DateTime;




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
        
        $categories= Category::all();
        return view('category.show', compact('categories'));
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
//        foreach ($categories as $category){
            $subcategories= Subcategory::all();
//            return $category->id;
//            return $subcategories;
//        }
        

//        return $subcategories;
        return view('category.show', compact('categories','subcategories'));
//        redirect()->action('CategoryController@listSubcategories')]
//        ('/category/listSubcategories');
         
    }
    
//    public function listSubcategories(){
//        return 'hello subcat';
//    }

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
        $category->updated_at = new DateTime;

        $category->save();
        
        $categories= Category::all();
        return view('category.show', compact('categories'));

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
        $category= Category::find($id);
        
        $category->deleted_at = new DateTime();
        
        $category->save();
        $category->delete();
        
        return back();
//        $categories= Category::all();
//        return view('category.show', compact('categories'));
    }
}
