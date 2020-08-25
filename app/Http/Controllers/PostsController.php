<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show()
    {
        return view('posts.show');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {   
        // get the data but don't save it in the database.
        $post = new Post($request->all());
        
        // assigning the post to the authenticated user.
        auth()->user()->posts()->save($post);

        return $post->title;
    }
}
