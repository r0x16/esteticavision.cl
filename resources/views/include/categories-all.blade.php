<div id="categories">
    <h2>Categorías</h2>
    @foreach($categories as $level0)
        <div class="category">
        <a class="expand-category" href="#subCategory{{$level0->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
                <span class="icon-plus"></span>
            </a>
            <a href="{{route('category', ['category' => $level0->id])}}">{{$level0->name}}</a>
        </div>
        <div class="collapse" id="subCategory{{$level0->id}}">
        @foreach($level0->childrens as $level1)
            <h2><a href="{{route('category', ['category' => $level1->id])}}">{{$level1->name}}</a></h2>
            <ul>
            @foreach($level1->childrens as $level2)
                <li>
                        <a href="{{route('category', ['category' => $level2->id])}}">{{$level2->name}}</a>
                </li>
            @endforeach
            </ul>
        @endforeach
        </div>
    @endforeach
</div>