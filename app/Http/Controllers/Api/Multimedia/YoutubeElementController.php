<?php

namespace App\Http\Controllers\Api\Multimedia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class YoutubeElementController extends MultimediaController
{
    /**
     * Almacena las referencias a un video de youtube agregado desde la API.
     * Parámetros
     * name: El nombre del elemento multimedia
     * src: el ID del video en youtube
     * thumbnail: Un arreglo con la url del thumbnail para el video y sus dimensiones.
     *
     * @param Request $r
     * @return void
     */
    public function youtubeStore(Request $r) {
        return $this->multimediaStore($r->name, $r->src, $r->thumbnail['url'], 1);
    }
}
