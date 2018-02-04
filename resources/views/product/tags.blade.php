@if($product->tags)
    <div class="tags">
        <div class="tags-title">Etiquetas:</div>
        @foreach($product->tags as $tag)
            <span class="badge badge-secondary">{{$tag->name}}</span>
        @endforeach
    </div>
@endif