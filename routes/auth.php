<?php

use Illuminate\Support\Facades\Route;

// Routes that require autentication.

Route::resource('tags', 'Admin\TagController');

Route::resource('categories', 'Admin\CategoryController');

Route::resource('posts', 'Admin\PostController');
