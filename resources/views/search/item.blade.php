<div class="search-result-item row">
    <div class="col-6 col-md-4">
        <div class="item-thumbnail">
            @if(count($p->medias))
                <img src="{{$p->medias[0]->thumbnail}}" alt="{{$p->medias[0]->name}}">
            @else
                <img src="/images/producto-sin-foto.jpg" alt="No Image Product">
            @endif
        </div>
    </div>
    <div class="col-6 col-md-8">
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
            @include('search.addtocart')
    </div>
</div>