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


/*=============================*/
/*********Admin Routes**********/
/*=============================*/

/**login**/
Route::get('M$l36opAdmin/login', 'AuthenticateController@showAdminLoginForm');
Route::post('M$l36opAdmin/login', 'AuthenticateController@adminLogin');

/**categories**/
Route::get('M$l36opAdmin/category', 'CategoryController@show');
Route::post('M$l36opAdmin/category','CategoryController@show');

Route::get('M$l36opAdmin/category/destroy/{id}','CategoryController@destroy');

Route::get('M$l36opAdmin/category/add','CategoryController@create');
Route::post('M$l36opAdmin/category/add','CategoryController@create');
Route::post('M$l36opAdmin/category/store','CategoryController@store');

Route::get('M$l36opAdmin/category/edit/{id}','CategoryController@edit');
Route::post('M$l36opAdmin/category/update/{id}','CategoryController@update');

/**subcategories**/



Route::get('M$l36opAdmin/subcategory/destroy/{id}','SubcategoryController@destroy');
Route::post('M$l36opAdmin/subcategory/destroy/{id}','SubcategoryController@destroy');

Route::get('M$l36opAdmin/subcategory/add/{id}','SubcategoryController@create');
Route::post('M$l36opAdmin/subcategory/store/{id}','SubcategoryController@store');
Route::post('M$l36opAdmin/subcategory/add/{id}','SubcategoryController@create');

Route::get('M$l36opAdmin/subcategory/edit/{id}','SubcategoryController@edit');
Route::post('M$l36opAdmin/subcategory/edit/{id}','SubcategoryController@edit');
Route::post('M$l36opAdmin/subcategory/edit/{id}','SubcategoryController@edit');
Route::post('M$l36opAdmin/subcategory/update/{id}','SubcategoryController@update');

/**items**/
Route::get('M$l36opAdmin/item', 'ItemController@show');
Route::post('M$l36opAdmin/item', 'ItemController@show');

Route::post('M$l36opAdmin/item/add','ItemController@create');
Route::post('M$l36opAdmin/item/store','ItemController@store');
Route::get('M$l36opAdmin/item/add','ItemController@create');
Route::post('M$l36opAdmin/item/destroy/{id}','ItemController@destroy');
Route::get('M$l36opAdmin/item/destroy/{id}','ItemController@destroy');
Route::get('M$l36opAdmin/item/edit/{id}','ItemController@edit');
Route::post('M$l36opAdmin/item/update/{id}','ItemController@update');

/**customers**/
Route::get('M$l36opAdmin/user', 'UserController@show');
Route::get('M$l36opAdmin/user/approve/{id}', 'UserController@approve');

/**orders**/
Route::get('M$l36opAdmin/orders', 'OrderController@ListAllOrders');
Route::get('M$l36opAdmin/order/details/{id}', 'OrderController@details');
Route::post('M$l36opAdmin/order/shipped/{id}', 'OrderController@shipped');




Route::get('M$l36opAdmin/order/store', 'OrderController@store');

//Route::post('/order/store/{orderId}', 'OrderController@store');
Route::get('M$l36opAdmin/order/review', 'OrderController@review');
Route::get('M$l36opAdmin/order/edit', 'OrderController@edit');
Route::post('M$l36opAdmin/order/create', 'OrderController@create');
//Route::get('/order/addItem', 'OrderController@addItem');
Route::get('M$l36opAdmin/order/addItem/{orderId}/{itemId}', 'OrderController@addItem');




/*=============================*/
   /*********Customer  API**********/
/*=============================*/

/**login**/
Route::get('/', 'AuthenticateController@showCustomerLoginForm');
Route::post('/', 'AuthenticateController@customerLogin');

/**registration**/
Route::get('/register', 'AuthenticateController@showCustomerRegistrationForm');
Route::post('/register', 'AuthenticateController@customerRegistration');

/**items & orders**/
Route::get('/items', 'OrderController@listAllItems');
Route::post('/item/{itemID}/addToCart', 'OrderController@addToCart');
Route::get('/order/send', 'OrderController@sendOrder');
