@extends('layouts.index')

@section('title')
{{ $product->name}} | {{ $app_name }}
@endsection

@section('meta')
<link rel="canonical" href="{{ $canonical }}">
<meta name="description" content="{{$product->name}} | {{$product->description}}">
@endsection

@section('styles')
<link rel="stylesheet" href="/css/product.css">
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@endsection

@section('footerscripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endsection

@section('body')
<div class="container-fluid" id="product-container">
    @include('include.management')
    <div class="row">
        <div class="col-md-3">
            @include('include.categories-all')
        </div>
        <div class="col-md-9">
            @include('product.breadcumb')
            <div class="row">
                <div class="col-md-6">
                    @include('product.summary')
                </div>
                <div class="col-md-6">
                    @include('product.multimedia')
                    @include('product.details')
                </div>
            </div>
            @include('product.features')
        </div>
    </div>
</div>
@endsection