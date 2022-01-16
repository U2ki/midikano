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

Auth::routes();

Route::get('/', 'TopController@index')->name('top');
Route::get('/mypage', 'HomeController@index')->name('mypage');
Route::post('/mypage', 'HomeController@send')->name('send-status-mail');
Route::get('/mypage/{status}', 'HomeController@status')->name('send-status');
Route::get('/gallery', 'PostController@index')->name('gallery');
Route::get('/gallery/create','PostController@create')->name('gallery.create');
Route::post('/gallery/create','PostController@store')->name('gallery.store');
Route::get('/gallery/{id}', 'PostController@show')->name('gallery.show');
Route::put('/gallery/{id}','PostController@update')->name('gallery.update');
Route::put('/gallery/comment/{id}','PostController@comment')->name('gallery.comment');
Route::delete('/gallery/{id}','PostController@destroy')->name('gallery.destroy');

Route::get('/gallery/likefirst/{id}','LikeController@firstcheck')->name('like.firstcheck');
Route::get('/gallery/like/{id}','LikeController@check')->name('like.check');

Route::get('/about-lacquerware', function () {
    return view('lacquerware');
});

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/create','NewsController@create')->name('news.create');
Route::post('/news/create','NewsController@store')->name('news.store');
Route::get('/news/{id}', 'NewsController@show')->name('news.show');
Route::put('/news/{id}','NewsController@update')->name('news.update');
Route::delete('/news/{id}','NewsController@destroy')->name('news.destroy');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@send')->name('send-contact');
