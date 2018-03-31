<div class="cart-options">
    <form action="/cart/add" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="product" value="{{$product->id}}">
        <button type="submit" class="btn btn-success">
            <span class="icon-cart"></span>
            Agregar al Carrito
        </button>
    </form>
</div>