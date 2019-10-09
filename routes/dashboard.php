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

		Route::delete('gallery/pointdelete', ['as'=>'delete.post.gallery.pointdelete','uses'=>'Dashboard\PostController@deleteImageGallery']);
	});

	Route::group(['prefix'=> 'user'], function(){
		Route::get('list', ['as'=>'get.dashboard.user.list','uses'=>'Dashboard\UserController@getList']);
		Route::get('add', ['as'=>'get.dashboard.user.add','uses'=>'Dashboard\UserController@getAdd']);
		Route::post('add', ['as'=>'post.dashboard.user.add','uses'=>'Dashboard\UserController@postAdd']);
		Route::get('edit/{id}', ['as'=>'get.dashboard.user.edit','uses'=>'Dashboard\UserController@getEdit']);
		Route::post('edit/{id}', ['as'=>'post.dashboard.user.edit','uses'=>'Dashboard\UserController@postEdit']);
		Route::get('del/{id}', ['as'=>'get.dashboard.user.del','uses'=>'Dashboard\UserController@postDel']);
	});

	Route::group(['prefix'=> 'function'], function(){
		Route::get('list', ['as'=>'get.dashboard.function.list','uses'=>'Dashboard\FunctionController@getList']);
		Route::get('add', ['as'=>'get.dashboard.function.add','uses'=>'Dashboard\FunctionController@getAdd']);
		Route::post('add', ['as'=>'post.dashboard.function.add','uses'=>'Dashboard\FunctionController@postAdd']);
		Route::get('edit/{id}', ['as'=>'get.dashboard.function.edit','uses'=>'Dashboard\FunctionController@getEdit']);
		Route::post('edit/{id}', ['as'=>'post.dashboard.function.edit','uses'=>'Dashboard\FunctionController@postEdit']);
		Route::get('del/{id}', ['as'=>'get.dashboard.function.del','uses'=>'Dashboard\FunctionController@postDel']);
	});
	Route::group(['prefix'=> 'config'], function(){
		Route::get('info', ['as'=>'get.dashboard.config.info','uses'=>'Dashboard\ConfigController@getConfig']);
		Route::post('info/{names}', ['as'=>'post.dashboard.config.info','uses'=>'Dashboard\ConfigController@postConfig']);
	});

});
