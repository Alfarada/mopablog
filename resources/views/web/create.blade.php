@extends('layouts.app')

@section('content')
    <h1>Crear Post</h1>
    {!! Form::open(['method' => 'POST', 'route' => 'posts.store']) !!}
        
        {!! Field::text('title')!!}

        {!! Field::textarea('excerpt')!!}

        {!! Field::textarea('content')!!}

        <div class="form-group row mb-0">
            <div class="col text-center">

                {!! Form::submit('Publicar',['class' => 'btn btn-primary']) !!}

            </div>
        </div>
        
    {!! Form::close() !!}
@endsection