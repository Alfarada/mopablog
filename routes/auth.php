<?php

use Illuminate\Support\Facades\Route;

// Routes that require autentication.

Route::get('posts/create', 'postsController@create')->name('posts.create');

Route::post('posts/create', 'postsController@store')->name('posts.store');
