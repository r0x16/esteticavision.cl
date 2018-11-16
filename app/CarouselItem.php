<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    public function multimedia() {
        return $this->belongsTo('App\Multimedia');
    }
}
