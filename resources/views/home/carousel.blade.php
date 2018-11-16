{{-- <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($carousel_items as $i => $item)
        <div class="carousel-item {{$i == 0? 'active': ''}}">
            <img class="d-block w-100" src="{{$item->multimedia->src}}" alt="{{$item->multimedia->name}}">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$item->title}}</h5>
                <p>{{$item->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> --}}
<div class="fotorama"
    data-fit="cover"
    data-width="100%"
    data-height="400"
    data-autoplay="true">
    @foreach($carousel_items as $i => $item)
    <div data-img="{{$item->multimedia->src}}">
        @if($item->title != '' || $item->description != '')
        <div class="carousel-caption d-none d-md-block">
            <h5>{{$item->title}}</h5>
            <p>{{$item->description}}</p>
        </div>
        @endif
    </div>
    @endforeach
</div>