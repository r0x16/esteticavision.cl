@if(count($product->features) > 0)
<div class="row feature">
    @foreach($product->features as $feature)
    <div class="col-md-11">
        <h3>{{$feature->title}}</h3>
        <div class="body">
            {!! $feature->description !!}
        </div>
    </div>
    @endforeach
</div>
@endif