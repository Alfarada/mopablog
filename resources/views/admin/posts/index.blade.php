@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"> Lista de Entradas 
                        <a class="btn btn-sm btn-primary float-right"
                            {{-- href=" {{ route('posts.create') }}" --}}
                            >
                            Crear post 
                        </a></h5>
                </div>
                <div class="card-body">
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
                                    <a href=" {{ route('posts.show', $post->id) }}"
                                        class="btn btn-sm btn-light">
                                        ver
                                    </a>
                                </td>
                                <td with="10px">
                                    {{-- <a href=" {{ route('posts.edit', $post->id) }}"
                                        class="btn btn-sm btn-light">
                                        editar
                                    </a> --}}
                                </td>
                                <td with="10px">
                                    {{-- {!! Form::open(['route' => ['posts.destroy', $post->id ], 'method' =>
                                    'DELETE']) !!}

                                    <button class="btn btn-sm btn-danger"> Eliminar</button>

                                    {!! Form::close()!!} --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection