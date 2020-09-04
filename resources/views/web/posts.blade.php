@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        <h1>Lista de Artículos</h1>
        @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-header">
                <h4>{{ $post->title }}</h4>
            </div>
            <div class="card-body">
                @if($post->file)
                <img src="{{ $post->file }}" class="img-responsive card-img-top" alt="{{ $post->title }}">
                @endif
                <p class="card-text">
                    {{ $post->excerpt }}
                </p>
                <a href=" {{ route('post', $post->slug ) }}" class="d-flex justify-content-end">Leer más</a>
            </div>
        </div>
        @endforeach
        {{ $posts->render() }}
    </div>
</div>
@endsection