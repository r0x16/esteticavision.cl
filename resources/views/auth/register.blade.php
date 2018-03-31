@extends('layouts.index')

@section('title')
Conexión a nuestra plataforma de usuarios
@endsection

@section('styles')
<link rel="stylesheet" href="/css/register.css">
@endsection

@section('footerscripts')
@endsection

@section('body')
<div class="container-fluid" id="register-container">
    @include('include.management')
    <h1>Conectate o registrate a nuestro sitio</h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            @include('auth.loginform')
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            @include('auth.registerform')
        </div>
    </div>
</div>
@endsection