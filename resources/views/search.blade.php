@extends('layouts.index')

@section('title')
{{ $query }} en Estética Visión
@endsection

@section('meta')
<meta name="description" content="Buscando {{ $query }} en Estética Visión">
@endsection

@section('styles')
<link rel="stylesheet" href="/css/search.css">
@endsection

@section('footerscripts')
@endsection

@section('body')
<div class="container-fluid" id="search-container">
    @include('include.management')
    <div class="row">
            <div class="col-md-3">
                @include('include.categories-all')
            </div>
            <div class="col-md-9">
                <h1 class="search-title">Resultados de búsqueda para "<span class="search-query">{{ $query }}</span>"</h1>
                <div class="search-results">
                    <div class="search-stats">
                        Mostrando
                        <strong>{{ $products->firstItem() }} - {{ $products->lastItem() }}</strong>
                        de un total de <strong>{{ $products->count() }}</strong>
                    </div>
                    @foreach($products as $p)
                        @include('search.item')
                    @endforeach
                </div>
                @include('search.pagination')
            </div>
    </div>
</div>
@endsection