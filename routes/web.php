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
Auth::routes();
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
include('dashboard.php');

Route::get('/', ['as'=>'index','uses'=>'Home\IndexController@index'])->name('index');
//TourController
Route::group(['prefix'=> 'tour'], function(){
	Route::get('/detail/{id}/{name}', ['as'=>'index.tour.single','uses'=>'Home\TourController@getTourSingle']);
	Route::get('/list/{id}/{name}', ['as'=>'index.tour.list','uses'=>'Home\TourController@getTourList']);
	//Shopping cart
	Route::get('/book/info', ['as'=>'index.tour.cart.get','uses'=>'Home\CartController@getCartInfo']);
	Route::get('/book/payment', ['as'=>'index.tour.payment.get','uses'=>'Home\CartController@getPayment']);
	Route::post('/book/payment', ['as'=>'index.tour.payment.post','uses'=>'Home\CartController@postPayment']);

	Route::post('/book/{id}', ['as'=>'index.tour.book.post','uses'=>'Home\CartController@postAddCart']);
	Route::get('/cart/delete', ['as'=>'index.tour.cart.delete.get','uses'=>'Home\CartController@getDeleteCart']);

});




