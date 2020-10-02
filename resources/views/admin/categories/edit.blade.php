@extends('layouts.app')

@section('content')

@component('shared._card')
    @slot('header', 'Editar categoría')

    @slot('content')
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
        
            @include('admin.categories.partials.form ')

        {!! Form::close() !!}
    @endslot

@endcomponent
@endsection
