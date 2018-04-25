<a href="/cart" class="cart_anchor" title="Mi carrito">
    <span class="icon-cart"></span>
    @if($cart_count !== null)
        <span class="badge badge-pill badge-info">{{$cart_count}}</span>
    @endif
</a>