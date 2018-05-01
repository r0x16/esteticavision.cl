@if(session('status') and session('status') === 'done')
<div class="alert alert-success" role="alert">
    Gracias por contactarse con nosotros, te enviaremos una respuesta a tu pregunta
    a la brevedad al correo electrónico ingresado en el formulario.
</div>
@endif