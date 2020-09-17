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

Route::get('posts/{post}-{slug}', 'PostController@show')->name('posts.show')->where('post','\d+');

Route::get('posts/create', 'PostController@create')->name('posts.create');

Route::post('posts/create', 'PostController@store')->name('posts.store');

Route::get('posts/edit/{post}-{slug}', 'PostController@edit')->name('posts.edit');

Route::put('posts/update', 'PostController@update')->name('posts.update');

Route::delete('posts/delete/{post}', 'PostController@destroy')->name('posts.destroy');
