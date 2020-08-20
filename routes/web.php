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
//新規投稿画面
Route::get('/mypage/newpost', 'Admin\PostController@newpost')->middleware('auth');
//詳細画面
Route::get('/mypage/post/detail', 'Admin\PostController@detail')->middleware('auth');
//編集画面
Route::get('/mypage/post/edit', 'Admin\PostController@edit')->middleware('auth');
//編集後の更新
Route::post('/mypage/post/edit', 'Admin\PostController@update')->middleware('auth');
//新規投稿
Route::post('/mypage/newpost', 'Admin\PostController@create')->middleware('auth');
//投稿削除
Route::get('/mypage/delete', 'Admin\PostController@delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

