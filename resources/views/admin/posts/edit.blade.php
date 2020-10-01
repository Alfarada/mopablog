@extends('layouts.app')

@section('content')

    @component('shared._card')
        @slot('header', 'Editar Post')

        @slot('content')
            {!! Form::model($post, ['route' => ['posts.update',$post->id], 'method' => 'PUT','files' => true]) !!}
                @include('admin.posts.partials.form ')
            {!! Form::close() !!} 
        @endslot

    @endcomponent
    
@endsection