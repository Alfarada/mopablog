@extends('layouts.app')

@section('content')

    @component('shared._card')
    
        @slot('header')
            Lista de posts
            <a class="btn btn-sm btn-primary float-right" href=" {{ route('posts.create') }}"> Crear post</a>
        @endslot

        @slot('content')
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th width="10px">ID</th>
                    <th>Nombre</th>
                    <th>Detalles</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td with="10px">
                        {{-- Show post Link --}}
                        <a id="ver" href=" {{ route('posts.show', $post->url_attr) }}" class="btn btn-sm btn-light">
                            ver
                        </a>
                    </td>
                    <td with="10px">
                        {{-- Update post link  --}}
                        <a href="{{ route('posts.edit', $post->url_attr) }}" class="btn btn-sm btn-light">
                            editar
                        </a>
                    </td>
                    <td with="10px">
                        {!! Form::open([
                        'route' => ['posts.destroy', $post],
                        'method' => 'DELETE']) !!}

                        <button class="destroy btn btn-sm btn-danger"> Eliminar </button>

                        {!! Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->render() }}
        @endslot
@endcomponent

@endsection