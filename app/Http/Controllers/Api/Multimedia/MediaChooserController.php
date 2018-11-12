<?php

namespace App\Http\Controllers\Api\Multimedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MultimediaResource;
use App\Multimedia;

class MediaChooserController extends Controller
{
    public function list(Request $request) {
        if($request->has('q')) {
            $medias = Multimedia::where('name', 'like', '%'.$request->q.'%')->paginate(12);
        } else {
            $medias = Multimedia::paginate(12);
        }
        return MultimediaResource::collection($medias);
    }
}
