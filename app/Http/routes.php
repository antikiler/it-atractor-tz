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

});

Route::group(['prefix'=>'cabinet','middleware' => 'auth'] ,function (){
	
	Route::get('/',['uses'=>'Cabinet\MainController@index','as'=>'cabinetHome']);

});
