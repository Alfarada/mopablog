@extends('layouts.app')

@section('content')

@component('shared._card')
        
    @slot('header')      
        Lista de categorías
        <a class="btn btn-sm btn-primary float-right" 
            href="{{ route('categories.create') }}"> Crear categoría </a>
    @endslot

    @slot('content')
        @component('shared._table')
            @slot('body')    
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>

                    <td><a id="ver" href="{{ route('categories.show', $category->url_attr) }}"
                            class="btn btn-sm btn-light"> ver </a>
                    </td>
                    <td><a href=" {{ route('categories.edit', $category->url_attr) }}"
                           class="btn btn-sm btn-light"> editar </a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger"> eliminar </button>
                        {!! Form::close()!!}
                    </td>
                </tr>
                @endforeach
            @endslot
        @endcomponent
    @endslot
@endcomponent
<div class="container d-flex justify-content-center">{{ $categories->render() }}</div>
@endsection