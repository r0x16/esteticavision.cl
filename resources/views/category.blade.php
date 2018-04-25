@extends('layouts.index')

@section('title')
{{ $category->name }} en {{ $app_name }}
@endsection

@section('meta')
<meta name="description" content="Categoría {{ $category->name }} en {{ $app_name }}">
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
                <h1 class="search-title">Categoría: "<span class="search-query">{{ $category->name }}</span>"</h1>
                @include('category.webpage')
                @include('category.main_products')
            </div>
    </div>
</div>
@endsection