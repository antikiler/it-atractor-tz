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
Route::get('/notrole',function (){
	echo "У вас не достаточно прав для просмотра этой стараницы";
})->name('notrole');

Route::auth();
Route::get('/',['uses'=>'MainController@index','as'=>'home']);


Route::group(['prefix'=>'admin','middleware' => ['auth','access:admin']],function (){
	
	Route::get('/',['uses'=>'Admin\MainController@index','as'=>'adminHome']);
	
	Route::group(['prefix'=>'category'],function (){
		Route::post('/delete','admin\CategoryController@delete');
		Route::post('/active','admin\CategoryController@active');
		Route::post('/update','admin\CategoryController@update');
	});
	Route::resource('/category','admin\CategoryController');

	Route::group(['prefix'=>'user'],function (){
		Route::post('/delete','admin\UserController@delete');
		Route::post('/active','admin\UserController@active');
		Route::post('/update','admin\UserController@update');
	});
	Route::resource('/user','admin\UserController');
	
	Route::group(['prefix'=>'behavior'],function (){
		Route::post('/delete','admin\BehaviorController@delete');
		Route::post('/active','admin\BehaviorController@active');
		Route::post('/update','admin\BehaviorController@update');
		Route::post('/add_img','admin\BehaviorController@addImg');
	});
	Route::resource('/behavior','admin\BehaviorController');
	Route::resource('/reviews','admin\ReviewsController');

});

Route::group(['prefix'=>'cabinet','middleware' => 'auth'] ,function (){
	
	Route::get('/',['uses'=>'Cabinet\MainController@index','as'=>'cabinetHome']);

});
