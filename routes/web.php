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

Route::resource('/', 'VisitorController');

Route::get('/post/{idku}', 'VisitorController@showPage');
Route::get('/post/delete/{id}', 'VisitorController@delete')->name('post.delete');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
	Route::resource('/post','PostController');
	Route::post('/delete','PostController@destroyall');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/comment','CommentController@addComment')->name('comment.add');
	Route::get('/comment/showComment','CommentController@showComment');
	Route::post('/comment/delete','CommentController@destroyall1');
	Route::get('/readMore/showComment','CommentController@showComment')->name('readmore');
	Route::get('/news', 'VisitorController@news');
});


Auth::routes();

