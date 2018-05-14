@extends('layouts.index')

@section('title', $app_name)

@section('styles')
<link rel="stylesheet" href="css/home.css">
@endsection

@section('footerscripts')
<script src="/js/vendor/parallax.min.js"></script>
@if($welcome_message)
    <script src="/js/welcome-modal.js"></script>
@endif
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
            {{--  @include('home.carousel')  --}}
            @include('home.featured')
        </div>
    </div>
</div>
@if($welcome_message)
    @include('home.welcome-modal')
@endif
@endsection