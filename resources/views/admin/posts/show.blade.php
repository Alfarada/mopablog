@extends('layouts.app')

@section('content')

    @component('shared._card')
        @slot('header', 'Detalles del Post')

        @slot('content')
            <p><strong>Nombre :</strong> {{ $post->title }}</p>
            <p><strong>Slug :</strong>   {{ $post->slug }}</p>
            <p><strong>Imagen :</strong> </p>
            <img class="img img-fluid" src="{{ $post->file }}" alt=" {{ $post->title }}">
            <p><strong>Estado :</strong> {{ $post->status }}</p>
            <p><strong>Extracto :</strong> {{ $post->excerpt }}</p>
            <p><strong>Contenido :</strong> {!! $post->body !!}</p>
        @endslot

    @endcomponent
@endsection