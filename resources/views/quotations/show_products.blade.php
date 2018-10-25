@foreach($products as $product)
    <div class="row">
        <div class="col-md-3 product_image">
            @include('cart.thumbnail')
        </div>
        <div class="col-md-6">
            {{ $product->name }}
        </div>
        <div class="col-md-2">
            Cantidad: {{$product->pivot->quantity}}
        </div>
    </div>
@endforeach