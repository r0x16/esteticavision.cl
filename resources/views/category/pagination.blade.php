<nav aria-label="search-paginator">
    <ul class="pagination justify-content-end">
        @if($products->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{$products->previousPageUrl()}}" tabindex="-1">Anterior</a>
            </li>
        @endif
        @for($i = 1; $i <= $products->lastPage(); $i++)
            @if($i == $products->currentPage())
            <li class="page-item active"><span class="page-link">{{$i}}</span></li>            
            @else
            <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{$i}}</a></li>
            @endif
        @endfor
        @if($products->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{$products->nextPageUrl()}}">Next</a>
            </li>
        @endif
    </ul>
</nav>