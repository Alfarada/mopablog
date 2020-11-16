@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-md-offset-2">
            <div class="card mb-3 mt-5">
                @if($post->file)
                <img src="{{ $post->file }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h1 class="py-2">{{ $post->title }}</h1>
                    <h2 class="py-2 text-muted">{{ $post->excerpt }}</h2>
                    <p class="lead">{{ $post->created_at->diffForHumans() }}</p>
                    <hr>
                    <p class="card-text">{{ $post->body }}</p>
                    <h6 class="pb-2"> Categoría | 
                        <a href="{{ route('category', [$post->category->id,$post->category->slug] ) }}"> {{ $post->category->title }}</a>
                    </h6>
                    <h6>Etiquetas |
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tag', $tag->url_attr) }}"> {{ '#'.$tag->title }} </a>
                        @endforeach
                    </h6>
                    <hr>
                    <h4>Comentarios</h4>

                    @if ($post->countComments() === 0)
                    <p> ¡¡ Haz tu primer comentario. !!</p>
                    @endif

                    @foreach ($post->lastestComments as $comment)
                    <div class="container d-flex">
                        <div class=" mr-3"><strong>{{ $comment->user->name.' ' }}</strong>|</div>
                        <div class=" text-muted">{{ $comment->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="container mt-3 h5"> {{ $comment->comment }} </div>
                    <hr>
                    @endforeach

                    {!! Form::open(['route' => ['comments.store', $post], 'method' => 'POST', 'class' => 'form']) !!}
                        {!! Form::textarea('comment',null, ['class' => 'form-control', 'rows' => 4, 'label' => 'Escribe un comentario']) !!}
                        {!! Form::submit('Publicar comentario', ['class' => 'my-3 btn btn-primary']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
    </div>
</div>
@endsection