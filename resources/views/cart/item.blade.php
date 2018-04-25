<div class="row item">
    <div class="col-md-1">
        @include('cart.delete-item')
    </div>
    <div class="col-md-3 product_image">
        @include('cart.thumbnail')
    </div>
    <div class="col-md-6">
        {{ $product->name }}
    </div>
    <div class="col-md-2">
        @include('cart.quantity')
    </div>
</div>