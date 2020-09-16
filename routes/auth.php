<?php

use App\Post;
use Illuminate\Support\Facades\Route;

/**
 * routes that require authentication and administrator status
 */

Route::resource('tags', 'TagController');

Route::resource('categories', 'CategoryController');

// RUTA TEMPORALMENTE DESHABILITADA
// Route::resource('posts', 'PostController');
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::get('posts/{post}-{slug}', 'PostController@show')->name('posts.show')->where('post','\d+');
