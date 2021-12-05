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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/a', 'HomeController@index')->name('home');
Route::get('/b', 'HomeController@index')->name('home');
Route::get('/c', 'HomeController@index')->name('home');
Route::get('/d', 'HomeController@index')->name('home');
Route::get('/theme{any}', 'SpaController@app')->where('any', '(/?$|/.*)');
