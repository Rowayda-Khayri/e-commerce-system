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
        
        return view('category.edit', compact('category'));
//        return redirect('/category'); // it works but how without sending $categories to view??!!
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
        
        $relatedSubcategories =  Subcategory::query()
                 ->leftjoin('categories as c', 'c.id', '=', 'subcategories.category_id')
                ->where('subcategories.category_id',"=",$category->id)
               ->get(['subcategories.*']);
        
        //delete related subcategories
           foreach ($relatedSubcategories as $subcategory){
//               dd($subcategory);
               $subcategory->deleted_at = new DateTime();
               $subcategory->save();
           }
                
//        dd($relatedSubcategories);

        $categories= Category::all();
        return view('category.show', compact('categories'));
    }
}
