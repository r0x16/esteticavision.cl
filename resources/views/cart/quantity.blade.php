<form action="/cart/quantity" method="post" class="form-inline">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" value="{{ $product->pivot->quantity }}" name="q" class="form-control quantity-control">
        <input type="hidden" name="product" value="{{ $product->id }}">
        <button type="submit" class="btn btn-success">
            <span class="icon-floppy-disk"></span>
        </button>
    </div>
</form>