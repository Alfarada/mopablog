<?php

namespace App\Http\Controllers;

use App\{Post, Category};

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

    public function category(Category $category, $slug)
    {
        if ($category->slug != $slug) {
            return redirect($category->url, 301);
        }

        $category = Category::where('slug', $slug)
            ->pluck('id')
            ->first();

        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')
            ->paginate($this->pagination);

        return view('web.posts', ['posts' => $posts]);
    }

    public function tag($tag, $slug)
    {
        $posts = Post::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')
            ->paginate($this->pagination);

        return view('web.posts', compact('posts'));
    }

    public function post(Post $post, $slug)
    {
        //$post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post'));
    }
}
