<div class="item-rate">
    @for($i = 0; $i < $p->rate; $i++)
        <span class="icon-star-full"></span>
    @endfor
    @for($i = 0; $i < 5-$p->rate; $i++)
        <span class="icon-star-empty"></span>
    @endfor
</div>