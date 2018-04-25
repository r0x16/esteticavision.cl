<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Multimedia extends Model
{
    public function getSrcAttribute($value) {
        if ($this->type === 0) {
            return Storage::disk('gallery')->url($value);
        }
        return $value;
    }

    public function getThumbnailAttribute($value) {
        if ($this->type === 0) {
            return Storage::disk('thumbnail')->url($value);
        }
        return $value;
    }
}
