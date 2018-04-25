<?php

namespace App\Http\Controllers\Api\Multimedia;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Multimedia;
use Intervention\Image\ImageManager;
use Storage;

class ImageUploadController extends MultimediaController
{
    private $uploadDisk = 'gallery';
    private $thumbnailDisk = 'thumbnail';
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
        $thumbnail = $this->saveThumbnailFile($r, $r->file);
        $multimedia = $this->multimediaStore($r->name, $filename, $thumbnail, 0);
        
        return $multimedia;
    }

    /**
     * Almacena la imagen subida por el usuario al filesystem.
     *
     * @param Request $r
     * @param UploadedFile $file
     * @return string
     */
    private function saveImageFile(Request $r, UploadedFile $file) {
        $filename = $this->getImageFilename($r->name, $file->extension(), $this->uploadDisk);
        return $file->storeAs('', $filename, $this->uploadDisk);
    }

    /**
     * Almacena la imagen en miniatura para thumbnails al filesystem
     *
     * @param Request $r
     * @param UploadedFile $file
     * @return string
     */
    private function saveThumbnailFile(Request $r, UploadedFile $file) {
        $manager = new ImageManager();
        $image = $manager
                        ->make($file)
                        ->fit(120, 120)
                        ->encode('jpg', 100);
        $filename = $this->getImageFilename($r->name, 'jpg', $this->thumbnailDisk);
        Storage::disk($this->thumbnailDisk)->put($filename, $image);
        return $filename;
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
    private function getImageFilename($name, $extension, $disk) {
        $file_slug = str_slug($name);
        $suffix = '';
        $index = 0;
        while(Storage::disk($disk)->exists($file_slug.$suffix.'.'.$extension)) {
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
