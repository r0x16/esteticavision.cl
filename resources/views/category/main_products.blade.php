<div class="search-results">
    <div class="search-stats">
        Mostrando
        <strong>{{ $products->firstItem() }} - {{ $products->lastItem() }}</strong>
        de un total de <strong>{{ $products->count() }}</strong>
    </div>
    <div class="row">
    @foreach($products as $p)
        <div class="col-md-6">
            @include('search.item')
        </div>
    @endforeach
    </div>
</div>
@include('category.pagination')