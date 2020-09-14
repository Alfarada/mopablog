<?php

use Illuminate\Support\Facades\Route;

/**
 * routes that require authentication and administrator status
 */

Route::resource('tags', 'TagController');

Route::resource('categories', 'CategoryController');

Route::resource('posts', 'PostController');
