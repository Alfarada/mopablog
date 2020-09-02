@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"> Ver Entradas </h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombre :</strong> {{ $post->title }}</p>
                            <p><strong>Slug :</strong>   {{ $post->slug }}</p>
                            <p><strong>Contenido :</strong>   {{ $post->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection