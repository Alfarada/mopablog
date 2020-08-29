<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function blog()
    {   
        $posts = Post::orderBy('id','DESC')
            ->where('status','PUBLISHED')->paginate(3);
            
        return view('web.posts',['posts' => $posts]);
    }

    public function post($slug)
    {
        $post = Post::where('slug',$slug)->first();

        return view('web.post', ['post' => $post ]);
    }
}
