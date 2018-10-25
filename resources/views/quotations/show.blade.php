@extends('layouts.profile')

@section('styles')
@parent
<link rel="stylesheet" href="/css/cart.css">
@endsection

@section('title')
@parent - Cotización #{{$quote->id}}
@endsection

@section('profile_body')
<h1>Detalle Cotización #{{$quote->id}}</h1>
<h4>Detalles</h4>
<ul>
    <li>Fecha: {{$quote->created_at->format('d-m-Y H:i')}}</li>
    <li>Estado: <span class="badge badge-{{$quote->statusMessage['color']}}">{{$quote->statusMessage['message']}}</span></li>
</ul>

<h4>Productos</h4>
@include('quotations.show_products')
@endsection