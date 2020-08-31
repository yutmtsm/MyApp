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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/mypage', 'Admin\MoneybikeController@mypage');
    Route::get('/mypage/addbike', 'Admin\MoneybikeController@addbike');
    //新規投稿画面
    Route::get('/mypage/newpost', 'Admin\PostController@newpost');
    //詳細画面
    Route::get('/mypage/post/detail', 'Admin\PostController@detail');
    //編集画面
    Route::get('/mypage/post/edit', 'Admin\PostController@edit');
    //編集後の更新
    Route::post('/mypage/post/edit', 'Admin\PostController@update');
    //新規投稿
    Route::post('/mypage/newpost', 'Admin\PostController@create');
    //投稿削除
    Route::get('/mypage/delete', 'Admin\PostController@delete');
    //following
    Route::get('mypage/following', 'Admin\MoneybikeController@following');
    
    // フォロー/フォロー解除を追加
    Route::post('mypage/following/follow', 'Admin\UsersController@follow')->name('follow');
    Route::delete('mypage/following/unfollow', 'Admin\UsersController@unfollow')->name('unfollow');
    
});

//他人のページに移動
Route::get('otherpage', 'MoneybikeController@otherpage');
Route::get('otherpage/followers', 'MoneybikeController@other_followers');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

