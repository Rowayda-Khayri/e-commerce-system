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



Route::get('/hello', function () { // I don't have HelloController, So this works
    return view('welcome');
});

Route::get('/about', function () { // I don't have AboutController, So this works
    return "about";
});

Route::get('/item', function () { // I  have ItemController, So this doesn't work
    return view('welcome');
});

Route::get('/category', function () { // I  have ItemController, So this doesn't work
    return view('welcome');
});


Route::get('order/create', 'OrderController@create'); // but why do I need to write it ??!
                                                // it's done without telling it to do that !!


Route::resource('user', 'UserController');
Route::resource('order', 'OrderController');
Route::resource('item', 'ItemController');
Route::resource('subcategory', 'SubcategoryController');
Route::resource('category', 'CategoryController');
