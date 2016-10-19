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
        
//        $requestLength = count($request->all());
//        
//        for($i=3;$i<$requestLength;$i++){
//            $subcategory= Subcategory::find($request[$i]);
//            $subcategory->name = $request[$i]->categoryName;
//        }
        
        
//        $subcategoriesList = Input::get('subcategoryName');
        
//        foreach($subcategoriesList as $subcategoryName => $n ) {
//            $subcategoryName= Subcategory::find($id);
//        
////        $subcategory->name = $n;
////        $subcategory->updated_at = new DateTime;
////        $subcategory->save();
//        }
//        return $subcategoriesList;
//        $categories= Category::all();
//        return view('category.show', compact('categories'));
        return [$request->all(),
            $request->input('subcategoryName.1')];
//        return $request[3][0];
//        return count($request->all());

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
