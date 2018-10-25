<div id="categories">
    <h2>Categorías</h2>
    <div class="alert alert-info">
        Indique las categorías por las que desea filtrar
    </div>
    <form method="get">
        <ul class="list-group form-group">
            @foreach($categories as $c)
                <li class="form-check list-group-item d-flex justify-content-between align-items-center">
                    <label for="category_{{$c->id}}">
                        {{$c->name}}
                    </label>
                    <input type="checkbox" name="category[]" value="{{$c->id}}" id="category_{{$c->id}}" {{in_array($c->id, $categories_filtered)?"checked":""}}>
                </li>
            @endforeach
        </ul>
        <input type="hidden" name="q" value="{{$query}}">
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Filtrar
            </button>
        </div>

    </form>
</div>