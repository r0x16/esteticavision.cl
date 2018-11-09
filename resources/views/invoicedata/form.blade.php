<form action="{{route('invoicedata_store')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="name">Nombre o Razón Social</label>
        <input value="{{$invoice_data->name}}" type="text" class="form-control" name="name" id="name">
    </div>

    <div class="form-group">
        <label for="tax_identification_id">RUT</label>
        <input value="{{$invoice_data->tax_identification_id}}" type="text" class="form-control" name="tax_identification_id" id="tax_identification_id" placeholder="XX.XXX.XXX-X">
    </div>

    <div class="form-group">
        <label for="address">Dirección</label>
        <input value="{{$invoice_data->address}}" type="text" class="form-control" name="address" id="address">
    </div>

    <div class="form-group">
        <label for="bussiness_activity">Giro</label>
        <input value="{{$invoice_data->bussiness_activity}}" type="text" class="form-control" name="bussiness_activity" id="bussiness_activity">
    </div>

    <div class="form-group">
        <label for="phone">Teléfono</label>
        <input value="{{$invoice_data->phone}}" type="text" class="form-control" name="phone" id="phone">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>