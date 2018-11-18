@extends('layouts.index')

@section('title', $app_name)

@section('styles')
<link rel="stylesheet" href="css/home.css">
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@endsection

@section('footerscripts')
<script src="/js/vendor/parallax.min.js"></script>
@if($welcome_message)
    <script src="/js/welcome-modal.js"></script>
@endif
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endsection

@section('body')
@include('home.parallax')
<div class="container-fluid" id="body">
    @include('include.management')
    <div class="row">
        <div class="col-md-3">
            @include('include.categories-all')
        </div>
        <div class="col-md-9">
            @if(count($carousel_items) > 0)
                @include('home.carousel')
            @endif
            @include('home.featured')
            @if($home_banner)
                @include('home.banner')
            @endif
        </div>
    </div>
</div>
@if($welcome_message)
    @include('home.welcome-modal')
@endif
@endsection