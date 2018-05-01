@if($errors->any())
<div class="alert alert-danger" role="alert">
    Ocurrieron los siguientes problemas al intentar enviar el formulario:
    <ul>
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
</div>
@endif