@extends('layouts.app')

@section('content')

    @component('shared._card')
        @slot('header', 'Crear un nuevo post')

        @slot('content')
            {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                @include('admin.posts.partials.form')
            {!! Form::close() !!}   
        @endslot

    @endcomponent
@endsection