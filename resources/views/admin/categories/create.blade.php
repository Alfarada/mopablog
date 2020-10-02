@extends('layouts.app')

@section('content')
    @component('shared._card')
    
        @slot('header','Crear categoría')

        @slot('content')
            {!! Form::open(['route' => 'categories.store']) !!}

                @include('admin.categories.partials.form')
            
            {!! Form::close() !!}
        @endslot
    @endcomponent
@endsection