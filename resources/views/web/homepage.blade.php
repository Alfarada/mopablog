@extends('layouts.app') 

@section('content')

    <!-- Cover image -->
    <div class="container-fluid">
        Esta es la imagen de Portada
    </div>
    <!-- Cover image -->

    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-9">   
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Nuestra Historia</h3>
                    </div>
                </div>
            </div>
            <!-- Content -->

            <!-- Barra lateral -->
            <div class="col-3">   
                <div class="card">
                    <div class="card-body">
                     <h5 class="blod"> Artículos mas recientes</h5>
                    </div>
                </div>
            </div>
            <!-- Barra lateral -->
        </div>
    </div>
@endsection