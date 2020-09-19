@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"> Lista de Categorías 
                        <a class="btn btn-sm btn-primary float-right"
                            href=" {{ route('categories.create') }}"
                            >Crear categoría</a></h5>
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

                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td with="10px">
                                    <a id="ver"
                                    href="{{ route('categories.show', [$category->id, $category->slug]) }}"
                                        class="btn btn-sm btn-light">
                                        ver
                                    </a>
                                </td>
                                <td with="10px">
                                    <a 
                                    href=" {{ route('categories.edit', [$category->id, $category->slug]) }}"
                                        class="btn btn-sm btn-light">
                                        editar
                                    </a>
                                </td>
                                <td with="10px">
                                    {!! Form::open(['route' => ['categories.destroy', $category ], 'method' =>
                                    'DELETE']) !!}

                                    <button class="btn btn-sm btn-danger"> Eliminar</button>

                                    {!! Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection