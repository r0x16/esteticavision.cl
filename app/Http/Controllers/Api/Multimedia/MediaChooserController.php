<?php

namespace App\Http\Controllers\Api\Multimedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MultimediaResource;
use App\Multimedia;

class MediaChooserController extends Controller
{
    public function list() {
        return MultimediaResource::collection(Multimedia::paginate(12));
    }
}
