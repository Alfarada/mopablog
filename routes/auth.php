<?php

use Illuminate\Support\Facades\Route;

Route::post('post/{post}/comment', 'CommentController@store')->name('comments.store');