@extends('layouts.app')

@section('content')
@component('shared._card')
    
    @slot('header', 'Crear etiqueta')
        
    @slot('content')
        {!! Form::open(['route' => 'tags.store']) !!}

            @include('admin.tags.partials.form')

        {!! Form::close() !!}
    @endslot
@endcomponent
@endsection