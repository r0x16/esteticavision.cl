<?php

namespace App\Http\Controllers\Api\Multimedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MultimediaResource;
use App\Multimedia;

class MediaChooserController extends Controller
{
    public function list(Request $request) {
        $medias = Multimedia::orderBy('name', 'asc');
        if($request->has('q')) {
            $medias = $medias->where('name', 'like', '%'.$request->q.'%');
        } 
        $medias = $medias->paginate(12);
        return MultimediaResource::collection($medias);
    }
}
