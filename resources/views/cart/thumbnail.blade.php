<div class="thumbnail">
    @if(count($product->medias))
        <img src="{{$product->medias[0]->thumbnail}}" alt="{{$product->medias[0]->name}}">
    @else
        <img src="/images/producto-sin-foto.jpg" alt="No Image Product">
    @endif
</div>