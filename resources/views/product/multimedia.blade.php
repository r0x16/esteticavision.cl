@if(count($product->medias) > 0)
<div class="fotorama"
    data-width="100%"
    data-ratio="800/600"
    data-nav="thumbs"
    data-thumbwidth="80"
    data-thumbheight="80"
    data-allowfullscreen="true"
    data-loop="true"
    >
        @foreach($product->medias as $media)
            @if($media->type == 1)
                <a href="https://youtube.com/watch?v={{$media->src}}">
            @else
                <a href="{{$media->src}}">
            @endif
                <img src="{{$media->thumbnail}}">
            </a>
        @endforeach
  </div>
@endif