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

Route::get('user', 'UserController@index');
Route::get('order', 'OrderController@index');
Route::get('item', 'ItemController@index');
Route::get('subcategory', 'SubcategoryController@index');
Route::get('category', 'CategoryController@show');

Route::get('/category/add','CategoryController@create');
Route::post('/category/store','CategoryController@store');

Route::post('/category','CategoryController@show');
Route::get('/category/edit/{id}','CategoryController@edit');
//Route::post('/category/edit/{id}','CategoryController@update');

Route::post('/category/update/{id}','CategoryController@update');
