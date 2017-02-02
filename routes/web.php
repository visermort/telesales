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

});



