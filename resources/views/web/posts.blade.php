@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        {{-- <h1 class="display-4"> - Artículos </h1> --}}
        <p class="text-center mt-4 display-3">Lista de artículos</p>
        
        @foreach($posts as $post)
        <div class="card my-5">
            
            @if($post->file)
            <img src="{{ $post->file }}" class="card-img-top" alt="{{ $post->title }}">
            @endif

            <div class="card-body">
                <div class="card-title">
                <h2>{{ $post->title }}</h2>
                <p class="card-text text-muted">{{ $post->excerpt }}</p>
                <p class="lead">{{ $post->created_at->diffForHumans() }}</p>
                    <a href=" {{ route('post', [$post->id, $post->slug]) }}" class="d-flex justify-content-end">Leer más</a>
                </div>
            </div>
            
        </div>
        @endforeach
        {{ $posts->render() }}
    </div>
</div>
@endsection