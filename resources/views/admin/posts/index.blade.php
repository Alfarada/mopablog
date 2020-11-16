@extends('layouts.app')

@section('content')

@component('shared._card') {{-- OPEN CARD COMPONENT --}}

    @slot('header')
        Lista de posts
        <a class="btn btn-sm btn-primary float-right"
            href=" {{ route('posts.create') }}"> Crear post</a>
    @endslot

    @slot('content') {{-- OPEN CONTENT SLOT --}}

    @component('shared._table') {{-- OPEN TABLE COMPONENT --}}

        @slot('body') {{-- OPEN BODY SLOT--}}
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>

                <td><a id="ver" href="{{ route('posts.show', $post->url_attr) }}"
                        class="btn btn-sm btn-light"> ver </a></td>

                <td><a href="{{ route('posts.edit', $post->url_attr) }}"
                        class="btn btn-sm btn-light"> editar </a></td>

                <td>
                    {!! Form::open(['route' => ['posts.destroy', $post],'method' => 'DELETE']) !!}
                        <button class="destroy btn btn-sm btn-danger"> Eliminar </button>
                    {!! Form::close()!!}
                </td>
            </tr>
            @endforeach   
        @endslot {{-- END BODY SLOT--}}
    @endcomponent {{-- END TABLE COMPONENT --}}
    @endslot    {{-- END CONTENT SLOT --}}   
@endcomponent {{-- END CARD COMPONENT --}}
<div class="container d-flex justify-content-center">{{ $posts->render() }}</div>
@endsection