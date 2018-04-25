<form action="/register" method="post">
    {{ csrf_field() }}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="registercontainer">
        <hgroup>
            <h3>¿Aún no tienes una cuenta?</h3>
            <h2>Crea una a continuación</h2>
        </hgroup>
        <div class="form registerform">
            <div class="mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="email">Correo Electrónico *</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password">Contraseña *</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password_confirmation">Repetir Contraseña *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <h4>Datos adicionales</h4>

            <div class="mb-3">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label for="address">Dirección</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <input type="submit" value="Registrarse" class="btn btn-primary btn-lg btn-block">
        </div>
    </div>
</form>