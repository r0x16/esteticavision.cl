<table class="table">
    <thead class="thead-ligth">
        <tr>
            <th>Orden</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($quotations as $quote)
            @include('quotations.item')
        @endforeach
    </tbody>
</table>