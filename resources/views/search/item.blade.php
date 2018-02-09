<div class="search-result-item row">
    <div class="col-5 col-md-2">
        @if(count($p->medias))
            <div class="item-thumbnail" style="background-image: url('{{$p->medias[0]->thumbnail}}')"></div>
        @else
            <div class="item-thumbnail" style="background-image: url('/images/producto-sin-foto.jpg')"></div>
        @endif
    </div>
    <div class="col-7 col-md-10">
            <a href="{{route('product', ['product' => $p->id, 'slug' => $p->slug])}}">
                {{ $p->name }}
            </a>
            @if($p->brand)
            <div class="item-brand">
                {{$p->brand->name}}
            </div>
            @endif
            <div class="item-code">cod. <strong>{{$p->code}}</strong></div>
            @include('search.rating')
    </div>
</div>