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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', 'Auth\CartalistController@index');
    Route::get('/register', 'Auth\CartalistController@registerForm');
    Route::post('/auth', 'Auth\CartalistController@login');
    Route::post('/complete_register', 'Auth\CartalistController@register');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/logout', 'Auth\CartalistController@logout');

});

Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin/users', 'Admin\UsersController@index');
    Route::get('/admin/users/edit/{userid}', 'Admin\UsersController@edit');
    Route::post('/admin/users/store', 'Admin\UsersController@store');
    Route::post('/admin/users/update/{userid}', 'Admin\UsersController@update');

    Route::get('/admin/goods', 'Admin\GoodController@index');
    Route::get('/admin/goods/edit/{userid}', 'Admin\GoodController@edit');
    Route::post('/admin/goods/store', 'Admin\GoodController@store');
    Route::post('/admin/goods/update/{userid}', 'Admin\GoodController@update');

    Route::get('/admin/services', 'Admin\ServiceController@index');
    Route::get('/admin/services/edit/{userid}', 'Admin\ServiceController@edit');
    Route::post('/admin/services/store', 'Admin\ServiceController@store');
    Route::post('/admin/services/update/{userid}', 'Admin\ServiceController@update');

    Route::get('/admin/additional', 'Admin\AdditionalController@index');
    Route::get('/admin/additional/edit/{userid}', 'Admin\AdditionalController@edit');
    Route::post('/admin/additional/store', 'Admin\AdditionalController@store');
    Route::post('/admin/additional/update/{userid}', 'Admin\AdditionalController@update');
    
    Route::get('/admin/state', 'Admin\StateController@index');
    Route::get('/admin/state/edit/{userid}', 'Admin\StateController@edit');
    Route::post('/admin/state/store', 'Admin\StateController@store');
    Route::post('/admin/state/update/{userid}', 'Admin\StateController@update');
    
});



