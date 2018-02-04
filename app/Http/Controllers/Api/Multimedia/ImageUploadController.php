<?php

namespace App\Http\Controllers\Api\Multimedia;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Multimedia;
use Storage;

class ImageUploadController extends MultimediaController
{
    private $uploadDisk = 'gallery';
    /**
     * Almacena una imagen subida a través de la API
     * parámetros
     * file: El archivo de imagen que será subido
     * data: la información extra acerca de la imagen
     *
     * @return boolean
     */
    public function imageStore(Request $r) {
        // Comprobar si el archivo se subió correctamente.
        if(!$this->fileIsValid($r)) {
            return response()->json(['error' => 'El archivo no fue enviado de manera correcta.'], 400);
        }

        $filename = $this->saveImageFile($r, $r->file);
        $multimedia = $this->multimediaStore($r->name, $filename, $filename, 0);
        
        return $multimedia;
    }

    /**
     * Almacena la imagen subida por el usuario al filesystem.
     *
     * @param Request $r
     * @param UploadedFile $file
     * @return void
     */
    private function saveImageFile(Request $r, UploadedFile $file) {
        $filename = $this->getImageFilename($r->name, $file->extension());
        return $file->storeAs('', $filename, $this->uploadDisk);
    }

    /**
     * Obtiene el nombre de archivo que tendrá el archivo de imagen, incluyendo su extensión.
     * Se basa en el nombre del recurso multimedia puesto por el usuario.
     * En caso de existir un nombre duplicado en el filesystem se agrega un sufijo númerico de 3 cifras.
     *
     * @param string $name El nombre del recurso multimedia que será utilizado apra obtener el slug
     * @param string $extension La extensión del archivo que será utilizada para guardarlo en el filesystem
     * @return string el nombre de archivo sin duplicados que será utilizado por la imagen.
     */
    private function getImageFilename($name, $extension) {
        $file_slug = str_slug($name);
        $suffix = '';
        $index = 0;
        while(Storage::disk($this->uploadDisk)->exists($file_slug.$suffix.'.'.$extension)) {
            $index++;
            $suffix = '-'-str_pad($index, 3, "0", STR_PAD_LEFT);
        }
        return $file_slug.$suffix.'.'.$extension;
    }

    /**
     * Comprueba si el archivo de imagen fue subido de manera correcta
     *
     * @param Request $r
     * @return boolean la validez del archivo
     */
    private function fileIsValid(Request $r) {
        return
            $r->hasFile('file')
            && $r->file->isValid();
    }

    public function listImages(Request $request) {
        \Log::debug($request);
        $images = Multimedia::where('type', 0)->orderBy('created_at','desc')->get();
        $data = [];
        foreach($images as $img) {
            $data[] = [
                'image' => $img->src,
                'thumb' => $img->thumbnail,
                'folder' => 'default'
            ];
        }
        return $data;
    }
}
