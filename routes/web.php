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
Route::get('/', 'Admin\ArticleController@create')->middleware('auth');
Route::get('/mypage', 'Admin\PersonalController@mypage')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

