@extends('layouts.profile')

@section('styles')
@parent
<link rel="stylesheet" href="/css/quoted.css">
@endsection

@section('title')
@parent - En proceso de cotización
@endsection

@section('profile_body')
<h1>Confirmación de la cotización</h1>
<div id="quoted">
    <h2>Gracias por tu preferencia</h2>
    <p>Felicidades, has finalizado correctamente tu pedido.</p>
    <p>Tu orden ha sido registrada y estaremos procesando tu cotización.</p>
    <p>
        Una vez que el pedido haya sido validado te enviaremos la cotización a tu correo electrónico,
        o también puedes consultarlo en tu página de pedidos, la que puedes visitar
    </p>
    <p>
        En esta misma página puedes revisar el estado del pedido,
        ingresando con tu correo y contraseña a nuestro sitio.
    </p>
</div>
@endsection