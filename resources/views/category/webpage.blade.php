@if($category->webpage and $category->active == 1)
    {!! $category->webpage->body !!}
@endif