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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::post('/post/create','PostsController@Create');
Route::post('/post/store','PostsController@store')->name('post.store');
Route::post('/post/update','PostsController@update');
Route::get('/post/{id}/delete','PostsController@delete');


Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search')->name('users.search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','PostsController@index');

Route::post('/search/{user}/follow','FollowsController@follow')->name('follow');
Route::post('/search/{user}/unfollow','FollowsController@unfollow')->name('unfollow');
