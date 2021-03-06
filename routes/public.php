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

Route::redirect('/','blog');
Auth::routes();

Route::get('blog', 'PageController@blog')->name('blog');
Route::get('entrada/{slug}', 'PageController@post')->name('post');
Route::get('categoria/{slug}', 'PageController@category')->name('category');
Route::get('etiqueta/{slug}', 'PageController@tag')->name('tag');






