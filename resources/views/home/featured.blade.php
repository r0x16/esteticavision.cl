<section class="featured">
    <div class="container">
        <h3>Productos Destacados</h3>
        <div class="row">
            @foreach($random_products as $product)
            <div class="col-6 col-md-2">
                <div itemscope itemtype="http://schema.org/Product" class="item">
                    <div class="header">
                        <span itemprop="name" class="name">{{$product->name}}</span>
                        @if($product->brand)
                            <span itemprop="brand" class="brand">- {{$product->brand->name}}</span>
                        @endif
                    </div>

                    <div class="thumbnail">
                    @if(count($product->medias))
                        <img itemprop="image" src="{{$product->medias[0]->thumbnail}}" alt="{{$product->medias[0]->name}}">
                    @else
                        <img itemprop="image" src="/images/producto-sin-foto.jpg" alt="No Image Product">
                    @endif
                    </div>

                    <span itemprop="description" class="description">
                        {{str_limit($product->description, 80, '(...)')}} 
                    </span>
                    <div class="features_more_button">
                        <a href="{{ route('product', [$product->id, $product->slug]) }}" class="btn btn-secondary btn-block">
                            Ver Más
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>