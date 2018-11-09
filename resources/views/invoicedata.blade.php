@extends('layouts.profile')

@section('title')
@parent - Mis datos de facturación
@endsection

@section('profile_body')
<h1>Tu información de facturación</h1>
<p class="small">
    En esta sección podrás agilizar nuestra gestión indicandonos cuál es la información
    que debemos incluir en la factura que será emitida luego de que realices un pedido.
</p>

@if (session('status'))
    <div class="alert alert-success">
        Se han guardado los cambios en sus datos de facturación correctamente.
    </div>
@endif

@include('invoicedata.form')

@endsection