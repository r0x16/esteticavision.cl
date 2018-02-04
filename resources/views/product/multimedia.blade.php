@if(count($product->medias) > 0)
<div id="images">
    <div class="active" style="background-image: url('{{$product->medias[0]->src}}')">

    </div>
    <div class="items">
        @foreach($product->medias as $media)
            <div class="item" style="background-image: url('{{$media->thumbnail}}')"></div>
        @endforeach
    </div>
</div>
@endif