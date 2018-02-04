<div class="rate">
    @for($i = 0; $i < $product->rate; $i++)
        <span class="icon-star-full"></span>
    @endfor
    @for($i = 0; $i < 5-$product->rate; $i++)
        <span class="icon-star-empty"></span>
    @endfor
    {{--  <span class="icon-star-half"></span>  --}}
</div>