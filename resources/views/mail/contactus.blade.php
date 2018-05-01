Un usuario se ha contactado a través del formulario en el sitio <strong>{{env('APP_URL')}}</strong>.
Estos son los detalles del contacto:
<p>
    Nombre: <strong>{{$name}}</strong>
</p>
<p>
    Correo electrónico: <strong>{{$email}}</strong>
</p>
<p>
    Cuerpo del mensaje: <br> {{$body}}
</p>