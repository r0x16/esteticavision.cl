<div class="text-right">
    <form action="/cart/add" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="product" value="{{$p->id}}">
        <button type="submit" class="btn btn-success" title="Agregar al carrito de compra">
            <span class="icon-cart"></span>
        </button>
    </form>
</div>