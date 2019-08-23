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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@home')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/profile/{id}', 'HomeController@profile')->name('profile');

Route::resource('/Post','PostController');

Route::get('following','HomeController@following');
Route::post('follow','HomeController@follow')->name('follow');
Route::post('unfollow','HomeController@unfollow')->name('unfollow');