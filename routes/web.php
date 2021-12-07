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
Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/theme{any}', 'SpaController@app')->where('any', '(/?$|/.*)');
