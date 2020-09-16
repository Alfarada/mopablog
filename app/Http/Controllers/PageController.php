<?php

namespace App\Http\Controllers;

use App\{Post, Category};
use Illuminate\Http\Request;

class PageController extends Controller
{   
    protected $pagination = 6;
    
    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')
            ->paginate($this->pagination);

        return view('web.posts', ['posts' => $posts]);
    }

    public function category($slug)
    {
        $posts = Category::where('slug', $slug)
            ->first()
            ->posts()
            ->orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')
            ->paginate($this->pagination);

        return view('web.posts', ['posts' => $posts]);
    }

    public function tag($slug)
    {   
        $posts = Post::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug',$slug);
        })
        ->orderBy('id','DESC')
        ->where('status','PUBLISHED')
        ->paginate($this->pagination);

        return view('web.posts', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('web.post', ['post' => $post]);
    }
}
