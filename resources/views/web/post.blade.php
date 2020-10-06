@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        <h4>{{ $post->title }}</h4>
        <div class="card mb-3">
            <div class="card-header">
                Categoría :
                <a href="{{ route('category', [$post->category->id,$post->category->slug] ) }}"> {{ $post->category->title }}</a>
            </div>
            <div class="card-body">
                @if($post->file)
                <img src="{{ $post->file }}" class="img-responsive card-img-top" alt="{{ $post->name }}">
                @endif
                <p class="card-text"> {{ $post->excerpt }} </p>
                <hr>
                {!! $post->body !!}
                <hr>
                <h5>Etiquetas</h5>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('tag', $tag->url_attr) }}"> {{ $tag->title }} </a>
                @endforeach
                <hr>
                {{-- Comments --}}
                <h4>Comentarios</h4>

                {{-- if comment empty --}}
                @if ($post->countComments() === 0)
                    <p>Haz tu primer comentario.</p>
                @endif

                @foreach ($post->lastestComments as $comment)
                    <div class="container d-flex">
                            <div class="p-2 mr-3"> Publicado por : <strong>{{ $comment->user->name }}</strong> </div>
                            <div class="p-2 text-muted">{{ $comment->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="container mt-3 h5"> {{ $comment->comment }} </div>
                    <hr>
                @endforeach
                
                {!! Form::open(['route' => ['comments.store', $post], 'method' => 'POST', 'class' => 'form']) !!}
                    {!! Form::textarea('comment',null, ['class' => 'form-control', 'rows' => 6, 'label' => 'Escribe un comentario']) !!}
                    {!! Form::submit('Publicar comentario', ['class' => 'my-3 btn btn-primary']) !!}
                {!! Form::close() !!}
                

            </div>
        </div>
    </div>
</div>
@endsection