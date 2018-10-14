@extends('layouts.profile')

@section('styles')
@parent
<link rel="stylesheet" href="/css/cart.css">
@endsection

@section('title')
@parent - Carrito de compra
@endsection

@section('profile_body')
<h1>Tu carrito de compra</h1>
@if($cart !== null)
    @include('cart.cart-list')
@else
    <div class="alert alert-info">
        Actualmente tu carrito de compra está vacío. Puedes volver al inicio <a href="/">desde aquí</a>
    </div>
@endif
@endsection