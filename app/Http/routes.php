<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', 'UserController@show');
Route::get('order', 'OrderController@show');
//Route::get('item', 'ItemController@index');
Route::get('/item', 'ItemController@show');
Route::post('/item', 'ItemController@show');
//Route::get('subcategory', 'SubcategoryController@index');

Route::get('category', 'CategoryController@show');
Route::post('/category','CategoryController@show');

Route::get('/category/destroy/{id}','CategoryController@destroy');

Route::get('/category/add','CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::post('/category/add','CategoryController@create');

Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/update/{id}','CategoryController@update');

//Route::get('/category/listSubcategories','CategoryController@listSubcategories');
//Route::post('/category/listSubcategories','CategoryController@listSubcategories');


Route::get('/subcategory/destroy/{id}','SubcategoryController@destroy');
Route::post('/subcategory/destroy/{id}','SubcategoryController@destroy');

Route::get('/subcategory/add/{id}','SubcategoryController@create');
Route::post('/subcategory/store/{id}','SubcategoryController@store');
Route::post('/subcategory/add/{id}','SubcategoryController@create');


Route::get('/subcategory/edit/{id}','SubcategoryController@edit');
Route::post('/subcategory/edit/{id}','SubcategoryController@edit');
Route::post('/subcategory/edit/{id}','SubcategoryController@edit');
Route::post('/subcategory/update/{id}','SubcategoryController@update');

Route::post('/item/add','ItemController@create');
Route::post('/item/store','ItemController@store');
Route::get('/item/add','ItemController@create');
Route::post('/item/destroy/{id}','ItemController@destroy');
Route::get('/item/destroy/{id}','ItemController@destroy');
Route::get('/item/edit/{id}','ItemController@edit');
Route::post('/item/update/{id}','ItemController@update');


Route::get('/user/approve/{id}', 'UserController@approve');


Route::get('/order/detail/{id}', 'OrderController@detail');
Route::post('/order/sent/{id}', 'OrderController@sent');
Route::get('/order/store', 'OrderController@store');
Route::get('/order/review', 'OrderController@review');
Route::get('/order/edit', 'OrderController@edit');
Route::get('/order/create', 'OrderController@create');
//Route::get('/order/addItem', 'OrderController@addItem');
Route::post('/order/addItem', 'OrderController@addItem');



Route::auth();

Route::get('/home', 'HomeController@index');
