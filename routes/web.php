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



