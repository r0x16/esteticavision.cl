@extends('layouts.index')

@section('title')
Tu perfil
@endsection

@section('styles')
<link rel="stylesheet" href="/css/profile.css">
@endsection

@section('body')
<div class="container-fluid" id="product-container">
    @include('include.management')
    <div class="row">
        <div class="col-md-3">
            @include('profile.nav')
        </div>
        <div class="col-md-9">
            @yield('profile_body')
        </div>
    </div>
</div>
@endsection