<div id="checkout">
    <form action="/cart/checkout" method="post">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">
            Solicitar cotización
        </button>
        <div class="separator"></div>
        <div class="form-group">
                <textarea name="extra" rows="5" class="form-control" placeholder="Información adicional"></textarea>
        </div>
        <div class="form-group">
            <input type="text" name="cc" class="form-control" placeholder="Emails adicionales">
        </div>
    </form>
    <div class="separator"></div>
    <div class="info">
        La cotización será enviada a su correo electrónico luego de nuestra verificación.
    </div>
</div>