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


Route::get('/',['as'=>'/','uses'=>'WelcomeController@index']);

Route::get('home', 'HomeController@index');
Route::post('showFind', [ 'as' => 'showFind', 'uses' => 'ProductController@showFind']);
Route::get('tim-kiem/{name}', [ 'as' => 'tim-kiem', 'uses' => 'ProductController@find']);
Route::get('ket-qua', [ 'as' => 'ket-qua', 'uses' => 'ProductController@search']);
Route::get('chi-tiet/{id}', [ 'as' => 'chi-tiet', 'uses' => 'ProductController@show']);

//chức năng giỏ hàng
Route::post('addCart', [ 'as' => 'addCart', 'uses' => 'ProductController@addCart']);
Route::delete('removeCart', [ 'as' => 'removeCart', 'uses' => 'ProductController@removeCart']);
Route::get('cart', [ 'as' => 'cart', 'uses' => 'ProductController@cart']);

//một số chức năng trang #
Route::get('about-us',['as'=>'about-us',function(){
    return view('about');
}]);

//ADMIN
Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
    Route::get('product/{id}/delete',['as'=>'admin.product.findDestroy','uses'=>'ProductController@find_destroy']);

    Route::post('product/tim-kiem',['as'=>'admin.product.showFindAdmin','uses'=>'ProductController@showFindAdmin']);
    Route::get('product/tim-kiem/{name}',['as'=>'admin.product.searchResult','uses'=>'ProductController@findProductsAdmin']);
    Route::resource('product','ProductController');

    Route::get('manu/{id}/delete',['as'=>'admin.manu.findDestroy','uses'=>'ManuController@find_destroy']);
    Route::resource('manu','ManuController');

    Route::get('type/{id}/delete',['as'=>'admin.type.findDestroy','uses'=>'TypeController@find_destroy']);
    Route::resource('type','TypeController');

    Route::get('user/{id}/delete',['as'=>'admin.user.findDestroy','uses'=>'UserController@find_destroy']);
    Route::resource('user','UserController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
