@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> Indice de etiquetas
                            <a class="btn btn-primary float-right" href=" {{ route('tags.create') }}">crear</a></h5>
                    </div>
                    <div class="card-body">

                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th width="10px">ID</th>
                                    <th>Nombre</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                    <td with="10px">
                                        <a href=" {{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-light">
                                            ver
                                        </a>
                                    </td>
                                    <td with="10px">
                                        <a href=" {{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-light">
                                            editar
                                        </a>
                                    </td>
                                    <td with="10px">
                                        <a href="#" class="btn btn-sm btn-danger"> Eliminar </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $tags->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection