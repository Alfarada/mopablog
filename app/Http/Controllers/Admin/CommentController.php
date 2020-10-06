<?php

namespace App\Http\Controllers\Admin;

use App\{Post,Comment};
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {   
        // Validatión 
        
        request()->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment([
            'comment' => request()->get('comment'),
            'post_id' => $post->id
        ]);

        auth()->user()->comments()->save($comment);

        alert('Tu comentario ha sido publicado');

        return back();
    }
}
