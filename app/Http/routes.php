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
//
//Route::get('/', function () {
//    return view('auth.adminLogin');
//});

/*=============================*/
/*********Admin Routes**********/
/*=============================*/

Route::get('M$l36opAdmin/login', 'AuthenticateController@showAdminLoginForm');
Route::post('M$l36opAdmin/login', 'AuthenticateController@adminLogin');




Route::get('user', 'UserController@show');
Route::get('order', 'OrderController@show');
Route::get('/item', 'ItemController@show');
Route::post('/item', 'ItemController@show');

Route::get('/category', 'CategoryController@show');
Route::post('/category','CategoryController@show');

Route::get('/category/destroy/{id}','CategoryController@destroy');

Route::get('/category/add','CategoryController@create');
Route::post('/category/add','CategoryController@create');
Route::post('/category/store','CategoryController@store');


Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/update/{id}','CategoryController@update');


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

//Route::post('/order/store/{orderId}', 'OrderController@store');
Route::get('/order/review', 'OrderController@review');
Route::get('/order/edit', 'OrderController@edit');
Route::post('/order/create', 'OrderController@create');
//Route::get('/order/addItem', 'OrderController@addItem');
Route::get('/order/addItem/{orderId}/{itemId}', 'OrderController@addItem');


/////////// API Test Routes

Route::get('/item/clientShow','ItemController@apiTest');



////////////Auth

Route::auth();

Route::get('/home', 'HomeController@index');



/*=============================*/
   /*********Client API**********/
/*=============================*/

Route::get('/', 'AuthenticateController@showCustomerLoginForm');
Route::post('/', 'AuthenticateController@customerLogin');
