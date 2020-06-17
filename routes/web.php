<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/**
 * User routes
 */

Route::resource('/user','UserController');
Route::put('/image','UserController@saveImage')->name('image');


Route::resource('post','ImageController');
Route::resource('comment','CommentController');

