<div style="padding:20px;background-color:#EEEEEE">
    <div style="background-color:#FFFFFF;padding-bottom:5px;">
        <div style="text-align:center">
            <img src="{{$message->embed($logo)}}" alt="KEP Medical" width="300" height="76">
        </div>
        <div style="border-top:1px solid #AAA;margin:20px;">
            <h1>TU ORDEN ESTÁ SIENDO PROCESADA</h1>
            <p>
                Gracias por tu interés en los productos de <strong>KEP Medical</strong>.
                Tu orden ha sido recibida y será procesada por nuestro equipo.
            </p>
            <table style="width:100%;text-align:left;margin:20px 0;">
                <thead>
                    <tr style="background-color:#387474;color:#FFFFFF">
                        <th>Detalles de la orden</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        Número de orden: <strong style="font-size:1.5em">{{$order->id}}</strong>
                        <br>
                        Fecha: {{$order->created_at->format('d / m / Y')}}
                        </td>
                        <td>
                        <strong>{{$user->name}}</strong>
                        <br>
                        {{$user->email}}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%"><tbody><tr>
            <td style="width:70%">
                <table style="width:100%;margin-right:10px;text-align:left;">
                    <thead>
                        <tr style="background-color:#387474;color:#FFFFFF">
                            <th></th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{$message->embedData(
                                            $thumbnails[$product->id]->encoded,
                                            $thumbnails[$product->id]->basename,
                                            $thumbnails[$product->id]->mime)}}" width="40" height="40">
                            </td>
                            <td style="font-size:1.1em">
                                <strong>{{$product->name}}</strong>
                            </td>
                            <td>
                                {{$product->pivot->quantity}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            <td valign="top">
                <table style="width:100%;text-align:left;">
                    <thead>
                        <tr style="background-color:#387474;color:#FFFFFF">
                            <th>Información Adicional</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{$order->extra}}
                            </td>
                        </tr>
                        @if($order->email_cc)
                        <tr>
                            <td>
                                Correos adicionales:
                                <strong>{{$order->email_cc}}</strong>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </td>
            </tr></tbody></table>
            <div style="margin:20px;color:#444;">
                <div>Si tiene alguna duda o si desea realizar algún cambio en su pedido, puede comunicarse con nosotros a través de:</div>
                <div>Telefono: <strong>(+569) 9256 2828</strong></div>
                <div>Email: <strong>contacto@kepmedical.cl</strong></div>
                <div>Formulario: <a href="https://www.kepmedical.cl/contacto">https://www.kepmedical.cl/contacto</a></div>
            </div>
        </div>
    </div>
</div>