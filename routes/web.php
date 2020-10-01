<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//product dependency injection
Route::bind('product', function ($slug){
	return App\Product::where('slug', $slug)->first();

});


//category dependency injection
Route::bind('categories', function ($category){
	return App\category::find($category);
});


//user dependency injection
Route::bind('users', function ($user){
	return App\user::find($user);
});



Route::get('/', [

	'as' => 'home',

	'uses' => 'StoreController@index'


]);


Route::get('product/{slug}',[ 

	'as' => 'product-detail',

	'uses' => 'StoreController@show'


]);


// carrito ---------


Route::get('cart/show', [

	'as' => 'cart-show',

	'uses' => 'CartController@show'
]);


Route::get('cart/add/{product}',[
	'as' => 'cart-add',
	'uses' => 'CartController@add'

]);



Route::get('cart/delete/{product}',[
	'as' => 'cart-delete',
	'uses' => 'CartController@delete'

]);


Route::get('cart/trash',[
	'as' => 'cart-trash',
	'uses' => 'CartController@trash'

]);


Route::get('cart/update/{product}/{quantity?}',[
	'as'=>'cart-update',
	'uses'=>'CartController@update'

]);



Route::get('order-detail',[                    
	'middleware' => 'auth',					//valida que haya iniciado sesion... middleware para saber si se inicio o no sesion
	'as' => 'order-detail',
	'uses' => 'CartController@orderDetail'
]);



//auth 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('/');




//  Admin 






Route::get('panel',[
	'as' => 'panel',
	'uses' => 'Admin\PanelController@panel'

]);




Route::resource('admin/categories', 'Admin\CategoryController');

Route::resource('admin/products', 'Admin\ProductController');

Route::resource('admin/users', 'Admin\UserController');


Route::resource('admin/orders', 'Admin\OrderController');



//mercado pago





Route::post('/procesar-pago', 'CartController@postHome');









