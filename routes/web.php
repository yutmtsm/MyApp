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
//     return view('welcome');
// });

// Route::get('/', function() {
//     return view('top')->middleware('auth');
// });
Route::get('/', 'Admin\MoneybikeController@create');
Route::get('/mypage', 'Admin\MoneybikeController@mypage')->middleware('auth');
Route::get('/mypage/addbike', 'Admin\MoneybikeController@addbike')->middleware('auth');
Route::get('/mypage/newpost', 'Admin\PostController@add')->middleware('auth');
Route::post('/mypage/newpost', 'Admin\PostController@create')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

