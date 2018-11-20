<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $appends = ['thumbnail'];

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function getThumbnailAttribute() {
        $thumb = $this->medias()->where('type', 0)->first();
        if($thumb === null){
            return "images/producto-sin-foto.jpg";
        }

        return $thumb->thumbnail;
    }

    public function getThumbnailPathAttribute() {
        $thumb = $this->medias()->where('type', 0)->first();
        if($thumb === null){
            return public_path() . "/images/producto-sin-foto.jpg";
        }

        return $thumb->thumbnail_path;
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
