<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function lastArticles()
    {   
        $posts = Post::latest()
            ->take(5)
            ->get();

        return view('web.homepage', compact('posts'));
    }
}
