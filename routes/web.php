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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/mypage', 'HomeController@index')->name('mypage');
Route::get('/gallery', 'PostController@index')->name('home');
Route::get('/about-lacquerware', function () {
    return view('lacquerware');
});
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/create','NewsController@create');
Route::post('/news/create','NewsController@store');
Route::get('/news/{id}', 'NewsController@show')->name('news');
Route::delete('/news/{id}','NewsController@delete');
Route::put('/news/{id}','NewsController@update');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@send')->name('send-contact');
Route::get('/theme{any}', 'SpaController@app')->where('any', '(/?$|/.*)');
