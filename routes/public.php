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

Route::get('post/{post}-{slug}', 'PageController@post')->name('post');

Route::get('categories/category/{category}-{slug}', 'PageController@category')->name('category');

Route::get('tags/tag/{tag}-{slug}', 'PageController@tag')->name('tag');

// Comments
// Route::post('post/{post}/comment', 'CommentController@store')->name('comments.store');