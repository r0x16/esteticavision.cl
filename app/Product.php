<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function medias() {
        return $this->belongsToMany('App\Multimedia')->withTimestamps();
    }

    public function details() {
        return $this->hasMany('App\ProductDetail');
    }

    public function features() {
        return $this->hasMany('App\ProductFeature');
    }
}
