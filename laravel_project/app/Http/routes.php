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

Route::match(['get','post'], '/admin', 'AdminController@login');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@check_pwd');
    Route::match(['get','post'], '/admin/update_pwd', 'AdminController@update_pwd');

    //Categories
    Route::match(['get','post'],'/admin/add_category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit_category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete_category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view_category', 'CategoryController@viewCategories');

});

Route::get('/logout', 'AdminController@logout');
