@extends('layouts.profile')

@section('title')
@parent - Cotizaciones
@endsection

@section('profile_body')
<h1>Tus Cotizaciones</h1>
@if($quotations !== null)
    @include('quotations.list')
@else
    <div class="alert alert-info">
        Por el momento no posee ninguna cotización. Puedes volver al inicio <a href="/">desde aquí</a>
    </div>
@endif
@endsection