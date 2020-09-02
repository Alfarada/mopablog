@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> Crear categoría </h5>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'categories.store']) !!}

                            @include('admin.categories.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection