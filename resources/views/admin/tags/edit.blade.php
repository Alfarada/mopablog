@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"> Editar Etiqueta</h5>
                </div>
                <div class="card-body">
                    {!! Form::model($tag,['route' => ['tags.update', $tag->id ], 'method' => 'PUT']) !!}

                    @include('admin.tags.partials.form ')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection