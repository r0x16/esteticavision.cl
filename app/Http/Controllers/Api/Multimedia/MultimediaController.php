<?php

namespace App\Http\Controllers\Api\Multimedia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Multimedia;

abstract class MultimediaController extends Controller
{
    /**
     * Persiste en la base de datos el elemento multimedia.
     *
     * @param string $name
     * @param string $src
     * @param string $thumbnail
     * @return Multimedia
     */
    protected function multimediaStore($name, $src, $thumbnail, $type) {
        $multimedia = new Multimedia;
        $multimedia->name = $name;
        $multimedia->src = $src;
        $multimedia->thumbnail = $thumbnail;
        $multimedia->type = $type;

        // Se persiste en la base de datos.
        $multimedia->save();
        return $multimedia;
    }
}
