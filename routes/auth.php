<?php

use Illuminate\Support\Facades\Route;

/**
 * routes that require authentication and administrator status
 */

//Route::resource('tags', 'TagController');

Route::get('tags', 'TagController@index')->name('tags.index');

Route::get('tags/{tag}-{slug}', 'TagController@show')->name('tags.show');

Route::get('tags/edit/{tag}-{slug}', 'TagController@edit')->name('tags.edit');

Route::put('tags/edit', 'TagController@update')->name('tags.update');

Route::delete('tags/delete/{tag}', 'TagController@destroy')->name('tags.destroy');

// Route::get('categories/create', 'CategoryController@create')->name('categories.create');

// Route::post('categories', 'CategoryController@store')->name('categories.store');

// Route::get('categories/edit/{category}-{slug}', 'CategoryController@edit')->name('categories.edit');

// Route::put('categories', 'CategoryController@update')->name('categories.update');

// Route::delete('categories/delete/{category}', 'CategoryController@destroy')->name('categories.destroy');

//CRUD CATEGORY ROUTES

Route::get('categories', 'CategoryController@index')->name('categories.index');

Route::get('categories/{category}-{slug}', 'CategoryController@show')->name('categories.show');

Route::get('categories/create', 'CategoryController@create')->name('categories.create');

Route::post('categories', 'CategoryController@store')->name('categories.store');

Route::get('categories/edit/{category}-{slug}', 'CategoryController@edit')->name('categories.edit');

Route::put('categories', 'CategoryController@update')->name('categories.update');

Route::delete('categories/delete/{category}', 'CategoryController@destroy')->name('categories.destroy');

// CRUD  POST ROUTES 

Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('posts/{post}-{slug}', 'PostController@show')->name('posts.show')->where('post','\d+');

Route::get('posts/create', 'PostController@create')->name('posts.create');

Route::post('posts/create', 'PostController@store')->name('posts.store');

Route::get('posts/edit/{post}-{slug}', 'PostController@edit')->name('posts.edit');

Route::put('posts/update', 'PostController@update')->name('posts.update');

Route::delete('posts/delete/{post}', 'PostController@destroy')->name('posts.destroy');
