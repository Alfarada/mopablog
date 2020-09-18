<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\{CategoryStoreRequest, CategoryUpdateRequest};

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.categories.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(CategoryStoreRequest $request)
    // {   
    //     // dd($request->all());
    //     $category = Category::create($request->all());

    //     alert('Categoría creada con éxito');

    //     return redirect()->route('categories.edit', $category->id);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $category = Category::find($id);
        
    //     return view('admin.categories.show', ['category' => $category]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $category = Category::find($id);

    //     return view('admin.categories.edit', ['category' => $category]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(CategoryUpdateRequest $request, $id)
    // {
    //     $category = Category::find($id);

    //     $category->fill($request->all())->save();

    //     alert('Categoría actualizada con exito');

    //     return redirect()->route('categories.edit', $category->id);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Category::find($id)->delete();

    //     alert('Categoría eliminada correctamente');

    //     return back();
    // }
}
