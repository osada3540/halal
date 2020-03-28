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

Route::get('/', 'PostsController@index');

//認証機能
Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'PostsController@index');

//ユーザ一覧表示
Route::get('/users/index', 'UsersController@index');

//プロフィール編集画面
Route::get('/users/edit', 'UsersController@edit');
//プロフィール編集画面
Route::post('/users/update', 'UsersController@update');

//プロフィール詳細画面
Route::get('/users/{user_id}', 'UsersController@show');

//新規投稿画面
Route::get('/posts/new', 'PostsController@new')->name('new');

//新規投稿処理
Route::post('/posts', 'PostsController@store');

//投稿削除機能
Route::get('/postsdelete/{post_id}', 'PostsController@destroy');

//フォロー、アンフォロー機能
Route::group(['prefix' => 'users/{id}'], function () {
    Route::post('follow', 'UserFollowController@store')->name('user.follow');
    Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
    Route::get('followings', 'UsersController@followings')->name('users.followings');
    Route::get('followers', 'UsersController@followers')->name('users.followers');
    Route::get('favorites', 'UsersController@favorites')->name('users.favorites');    
});

//お気に入り機能
Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
});