<?php

Route::group(['prefix'=> 'dashboard'], function(){
	Route::group(['prefix'=> 'auth'], function(){
		Route::get('logout', ['as'=>'get.dashboard.auth.logout','uses'=>'Dashboard\DashboardController@getLogout']);
	});
	Route::group(['prefix'=> 'category'], function(){
		Route::get('list/{name}', ['as'=>'get.dashboard.category.list','uses'=>'Dashboard\CateController@getList']);
		Route::get('add/{name}', ['as'=>'get.dashboard.category.add','uses'=>'Dashboard\CateController@getAdd']);
		Route::post('add/{name}', ['as'=>'post.dashboard.category.add','uses'=>'Dashboard\CateController@postAdd']);
		Route::get('edit/{name}/{id}', ['as'=>'get.dashboard.category.edit','uses'=>'Dashboard\CateController@getEdit']);
		Route::post('edit/{name}/{id}', ['as'=>'post.dashboard.category.edit','uses'=>'Dashboard\CateController@postEdit']);
		Route::get('del/{id}', ['as'=>'get.dashboard.category.del','uses'=>'Dashboard\CateController@postDel']);
	});

	Route::group(['prefix'=> 'post'], function(){
		Route::get('list', ['as'=>'get.dashboard.post.list','uses'=>'Dashboard\PostController@getList']);
		Route::get('add', ['as'=>'get.dashboard.post.add','uses'=>'Dashboard\PostController@getAdd']);
		Route::post('add', ['as'=>'post.dashboard.post.add','uses'=>'Dashboard\PostController@postAdd']);
		Route::get('edit/{id}', ['as'=>'get.dashboard.post.edit','uses'=>'Dashboard\PostController@getEdit']);
		Route::post('edit/{id}', ['as'=>'post.dashboard.post.edit','uses'=>'Dashboard\PostController@postEdit']);
		Route::get('del/{id}', ['as'=>'get.dashboard.post.del','uses'=>'Dashboard\PostController@postDel']);

	});



});
