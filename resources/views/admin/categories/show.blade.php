@extends('layouts.app')

@section('content')
    @component('shared._card')
        @slot('header','Detalles de la categoría')
        
        @slot('content')
        <p><strong>Nombre :</strong> {{ $category->title }}</p>
        <p><strong>Slug :</strong> {{ $category->slug }}</p>
        <p><strong>Contenido :</strong> {{ $category->body }}</p>
        @endslot
        
    @endcomponent
@endsection