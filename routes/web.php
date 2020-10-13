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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('account')->group(function () {
    Route::get('login/{role}','AccountController@login')->name('account.login');
    Route::get('register/{role}','AccountController@register');
    Route::post('register/{role}','AccountController@store');
    Route::post('login/{role}','AccountController@auth');
});

Route::group(['prefix'=>'user','middleware' => 'auth'],function() {
    Route::get('dashboard','UserController@home')->name('user.home');
    Route::get('makeBlog','UserController@makeblog')->name('user.makeblog');
});