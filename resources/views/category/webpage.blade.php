@if($category->webpage and $category->webpage->active == 1)
    {!! $category->webpage->body !!}
@endif
