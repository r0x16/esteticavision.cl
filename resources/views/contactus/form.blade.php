<form action="/contact" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="contact_name">Tu nombre *</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="contact_email">Dirección de correo electrónico *</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" aria-describedby="emailHelp">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="contact_subject">Asunto *</label>
        <input type="text" class="form-control" id="contact_subject" name="contact_subject">
    </div>
    <div class="form-group">
        <label for="contact_body">Mensaje *</label>
        <textarea class="form-control" id="contact_body" name="contact_body" rows="3" aria-describedby="bodyHelp"></textarea>
        <small id="bodyHelp" class="form-text text-muted">
            Recuerda indicarnos la mayor cantidad de detalles de tu solicitud en este campo.
            Esto nos ayudará a resolver tus dudas de manera más rápida.
        </small>
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu dirección de correo electrónico con nadie</small>
    </div>
    <p>
        <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
    </p>
    <p>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </p>
</form>