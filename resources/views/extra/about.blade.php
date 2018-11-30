@extends('layouts.index')

@section('title')
Sobre Nosotros | {{ $app_name }}
@endsection

@section('body')
<div class="container-fluid" id="product-container">
    @include('include.management')
    <div class="row">
        <div class="col-md-3">
            @include('include.categories-all')
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <h1 class="display-4">Sobre Nosotros</h1>
                <p class="lead">
                    KEP Medical otorga soluciones integrales de distribución de insumos y equipos médicos, entregando la mejor ayuda y asesoría en todo el proceso de compra.
                </p>
                <hr class="my-4">
                <p>
                    Kep Medical garantiza productos de la mejor calidad entregados rápidamente mediante los diferentes canales de envíos.
                </p>
                <p>        
                    Con profesionales de más de 10 años de experiencia en diversas áreas de la medicina, la empresa se focaliza en que el cliente obtenga la mejor experiencia y solución dentro de su necesidad.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection