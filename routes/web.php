<?php

use App\Order;

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

//---------- fronted routes ----------------------
Route::get('/','HomePageController@index')->name('home');

Route::get('/shop','ShopController@index')->name('shop.index');

Route::get('/shop/{product}','ShopController@show')->name('shop.show');

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');

Route::get('/checkout','CheckoutController@index')->name('checkout.index');

Route::get('empty','CartController@empty');

Route::get('/customerlogin', function () {
    return view('customerlogin');
});

Route::post('/customer_order','OrderController@Orderstore')->name('customer.order');



//------------------- Dashboard routes -------------------

Route::get('/admin','DashboardController@index')->middleware('auth');



// Route::get('/product-list', 'DashboardController@ProductList')->middleware('auth');
// Route::get('/product-add','DashboardController@ProductCreate')->middleware('auth');
// Route::post('/product-add','DashboardController@ProductStore')->name('admin.productstore')->middleware('auth');


// Route::get('/category-list', 'AdminCategoryController@index')->name('admin.categorylist')->middleware('auth');
// Route::get('/category-add','AdminCategoryController@create')->name('admin.categoryadd')->middleware('auth');
// Route::post('/category-add','AdminCategoryController@Store')->name('admin.categorystore')->middleware('auth');

// Route::get('/category-list/{id}/edit','AdminCategoryController@edit')->name('admin.categoryedit')->middleware('auth');
// Route::get('/category-list/{id}/delete','AdminCategoryController@destroy')->name('admin.categorydestroy')->middleware('auth');
// Route::post('/category-list/{id}/update','AdminCategoryController@update')->name('admin.categoryupdate')->middleware('auth');

Route::resource("category-list", "AdminCategoryController")->middleware('auth');
Route::resource("product-list", "AdminProductController")->middleware('auth');

Route::get('/order', function () {
	$orders = Order::all();
    return view('admin-panel/order')->with('orders',$orders);
})->middleware('auth');

Route::get('/order/{id}', function ($id) {
   
 $order = Order::findOrFail($id);

 return view('admin-panel/order_pdf')->with('order', $order);

})->name('order.viewpdf')->middleware('auth');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
