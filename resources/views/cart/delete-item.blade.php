<form action="/cart/delete" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="product" value="{{ $product->id }}">
    <button type="submit" class="btn btn-danger">
        <span class="icon-cross"></span>
    </button>
</form>