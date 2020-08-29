@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        <div class="card mb-3">
            <div class="card-header">
                <h4>{{ $post->title }}</h4>
            </div>
            <div class="card-body">
                @if($post->file)
                <img src="{{ $post->file }}" class="img-responsive card-img-top" alt="{{ $post->name }}">
                @endif
                <p class="card-text">
                    {{ $post->excerpt }}
                </p>
                <hr>
                {!! $post->body !!}
                <hr>
                <h5>Etiquetas</h5>
                @foreach ($post->tags as $tag)
                    <a href="#"> {{ $tag->title }} </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection