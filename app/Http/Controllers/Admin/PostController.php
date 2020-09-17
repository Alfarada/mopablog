<?php

namespace App\Http\Controllers\Admin;

use App\{Tag, Post, Category};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{PostStoreRequest, PostUpdateRequest};

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate(6);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('title', 'ASC')->pluck('title', 'id');
        $tags       = Tag::orderBy('title', 'ASC')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());

        // IMAGE
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }

        // Tags
        $post->tags()->attach($request->get('tags'));

        alert('Entrada creada con éxito');

        return redirect()->route('posts.show', [$post->id,$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug)
    {
        //$this->authorize('pass', $post);

        if ($post->slug != $slug) {
            return redirect($post->url, 301);
        }

        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        // $post = Post::find($id);
        // $this->authorize('pass', $post);

        $categories =  Category::orderBy('title', 'ASC')->pluck('title', 'id');
        $tags       = Tag::orderBy('title', 'ASC')->get();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        // $post = Post::find($post->id);
        //$this->authorize('pass', $post);
        $post->fill($request->all())->save();

        // Image
        if ($request->file('file')) {

            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }

        // Tags
        $post->tags()->sync($request->get('tags'));

        alert('Entrada actualizada con exito');

        return redirect()->route('posts.show', [$post->id, $post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $post = Post::find($id);
    //     $this->authorize('pass', $post);
    //     $post->delete();

    //     alert('Entrada eliminada correctamente');

    //     return back();
    // }
}
