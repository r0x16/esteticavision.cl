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
<div class="row">
    <div class="col-md-8">
        <div id="cart_list">
            @foreach($cart->products as $product)
                @include('cart.item')
            @endforeach
        </div>
    </div>
    <div class="col-md-4">
        @auth
            @include('cart.checkout')
        @endauth
        @guest
            @include('cart.login')
        @endguest
    </div>
</div>
@endsection