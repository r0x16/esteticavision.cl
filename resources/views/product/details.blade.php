@if(count($product->details) > 0)
<div class="details">
    <h4>Características</h4>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Parámetro</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product->details as $detail)
            <tr>
                <td>{{$detail->name}}</td>
                <td>{{$detail->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif