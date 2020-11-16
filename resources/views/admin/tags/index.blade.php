@extends('layouts.app')

@section('content')
    @component('shared._card')
        
    @slot('header')        
        Lista de Etiquetas
        <a class="btn btn-sm btn-primary float-right" href=" {{ route('tags.create') }}"> Crear etiqueta</a>
    @endslot

    @slot('content') 
        @component('shared._table')
            @slot('body')
                @foreach ($tags as $tag)
                <tr>
                    <td> {{ $tag->id }} </td>
                    <td> {{ $tag->title }} </td>
                    <td> <a href=" {{ route('tags.show', $tag->url_attr ) }}"
                            class="btn btn-sm btn-light"> ver </a>
                    </td>
                    <td><a href=" {{ route('tags.edit', $tag->url_attr) }}"
                            class="btn btn-sm btn-light"> editar </a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['tags.destroy', $tag ], 'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger"> eliminar </button>
                        {!! Form::close()!!}
                    </td>
                </tr>
                @endforeach
            @endslot
        @endcomponent
    @endslot
    @endcomponent
    
<div class="container d-flex justify-content-center">{{ $tags->render() }}</div>
@endsection