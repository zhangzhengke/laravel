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


	
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.login']],function(){//一般后台
	
	Route::get('index','IndexController@index');
	Route::get('info','IndexController@info');
	Route::resource('article','ArticleController');
	Route::get('loginout','IndexController@loginout');
	Route::any('cgpass','IndexController@cgpass');
	Route::resource('category','CategoryController');
	}
);

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.nologin']],function(){//登录
	Route::any('login','LoginController@login');
	
	
	//Route::any('crypt','LoginController@crypt');
	//Route::get('getcode','LoginController@getcode');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){//通用
	Route::get('code','LoginController@code');
});
