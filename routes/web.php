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

Route::get('/', 'TopController@top');

Route::group(['middleware' => 'auth'], function(){
    
    // トップページ表示
  
    
    Route::get('/mypage', 'Admin\MoneybikeController@mypage');
    
    //投稿関連
    //新規投稿画面
    Route::get('/mypage/newpost', 'Admin\PostController@newpost');
    //詳細画面
    Route::get('/mypage/post/detail', 'Admin\PostController@detail');
    // 日毎の詳細画面
    Route::get('/mypage/post/day_details', 'Admin\PostController@day_details');
    //編集画面
    Route::get('/mypage/post/edit', 'Admin\PostController@edit');
    //編集後の更新
    Route::post('/mypage/post/edit', 'Admin\PostController@update');
    //新規投稿
    Route::post('/mypage/newpost', 'Admin\PostController@create');
    //投稿削除
    Route::get('/mypage/spot_search/delete', 'Admin\PostController@delete');
    
    //バイク関連
    //バイク新規追加画面
    Route::get('mypage/add_bike', 'Admin\BikeController@add');
    Route::post('mypage/add_bike', 'Admin\BikeController@create');
    Route::get('mypage/edit', 'Admin\BikeController@edit');
    Route::post('mypage/edit', 'Admin\BikeController@update');
    Route::get('/mypage/delete', 'Admin\BikeController@delete');
    
     //お金管理
    //お金管理トップ遷移
    Route::get('mypage/money', 'Admin\MoneyController@add_money');
    //お金管理トップ
    Route::get('mypage/money', 'Admin\MoneyController@moneypage');
    Route::get('mypage/other_money', 'Admin\MoneyController@other_moneypage');
    // Route::get('mypage/money', 'Admin\MoneyController@search');
    // Route::get('mypage/other_money', 'Admin\MoneyController@search');
    // Route::post('mypage/money/next_month', 'Admin\MoneyController@next_month');
    // Route::post('mypage/money/last_month', 'Admin\MoneyController@last_month');
    
    // コメント
    // 追加
    Route::post('mypage/post/coomment', 'Admin\CommentController@create');
    
    //following
    Route::get('mypage/following', 'Admin\MoneybikeController@following');
    //スポット検索
    Route::get('mypage/spot_search', 'Admin\MoneybikeController@spot_search');
    //検索
    Route::get('mypage/spot_search', 'Admin\MoneybikeController@search');
    
    // フォロー/フォロー解除を追加
    Route::post('mypage/following/follow', 'Admin\UsersController@follow')->name('follow');
    Route::delete('mypage/following/unfollow', 'Admin\UsersController@unfollow')->name('unfollow');
    
});

//他人のページに移動
Route::get('otherpage', 'MoneybikeController@otherpage');
Route::get('otherpage/followers', 'MoneybikeController@other_followers');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

