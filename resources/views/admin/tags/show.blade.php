@extends('layouts.app')

@section('content')
    @component('shared._card')
        @slot('header', 'Detalles de la etiqueta')
            
        @slot('content')         
            <p><strong>Nombre</strong> {{ $tag->title }}</p>
            <p><strong>Slug</strong> {{ $tag->slug }}</p>
            <p><strong>fecha:</strong> {{ $tag->created_at }}</p> 
        @endslot
    @endcomponent
@endsection