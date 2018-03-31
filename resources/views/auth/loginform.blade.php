<form action="/login" method="post">
    {{ csrf_field() }}
    <div class="logincontainer">
        <hgroup>
            <h3>¿Tienes una cuenta?</h3>
            <h2>Logueate acá</h2>
        </hgroup>
        <div class="form loginform">
            <div class="mb-3">
                <label for="login_username">Correo Electrónico</label>
                <input type="text" name="email" id="login_username" class="form-control">
            </div>

            <div class="mb-3">
                    <label for="login_password">Contraseña</label>
                    <input type="password" name="password" id="login_password" class="form-control">
            </div>

            <input type="submit" value="Conectarse" class="btn btn-primary btn-lg btn-block">
        </div>
    </div>
</form>
<div class="separator"></div>
@include('auth.social')