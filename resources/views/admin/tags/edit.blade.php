@extends('layouts.app')

@section('content')
@component('shared._card')
    @slot('header', 'Editar etiqueta')
        
    @slot('content')
        {!! Form::model($tag,['route' => ['tags.update', $tag->url_attr ], 'method' => 'PUT']) !!}

            @include('admin.tags.partials.form ')

        {!! Form::close() !!}
    @endslot
@endcomponent
@endsection