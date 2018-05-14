<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bienvenido a {{$app_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>
                Estimado/a <strong>{{$user->name}}</strong>,
            </p>
            <p>
                Gracias por registrarte en nuestro sitio,
                ya puedes empezar a agregar productos en tu carrito, y de esta manera
                puedes solicitar cotizaciones a nuestro equipo,
                las cuales serán entregadas directamente en tu correo electrónico.
            </p>
            <p>
                Esperamos que este sitio sea de utilidad al momento de adquirir nuestros productos,
                <strong>Muchas gracias</strong>.
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>