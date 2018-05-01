@extends('layouts.index')

@section('title')
Contacto | {{ $app_name }}
@endsection

@section('meta')
<meta name="description" content="Contáctate con {{ $app_name }} para obtener información adicional">
@endsection

@section('styles')
<link rel="stylesheet" href="/css/extra.css">
@endsection

@section('headerscripts')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('body')
<div class="container-fluid">
    @include('include.management')
</div>
<div class="container" id="contact-container">
    <h1>¿En qué podemos ayudarte?</h1>
    <div class="row">
        <div class="col-md-7">
            <p>
                Si tienes alguna duda o consulta sobre cualquier aspecto de nuestra empresa,
                sitio web o nuestros servicios puedes hacerla acá.
            </p>
            <p>
                Rellena el formulario que se encuentra a continuación y te responderemos
                a la brevedad.
            </p>
            @include('contactus.errors')
            @include('contactus.done')
            @include('contactus.form')
        </div>
        <div class="col-md-5">
            @include('contactus.alternatives')
        </div>
    </div>
</div>
@endsection
