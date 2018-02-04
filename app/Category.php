<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function webpage() {
        return $this->hasOne('App\CategoryWebpage');
    }

    public function father() {
        return $this->belongsTo('App\Category', 'supercategory_id');
    }
}
