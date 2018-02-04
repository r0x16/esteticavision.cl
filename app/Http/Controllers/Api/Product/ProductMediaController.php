<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Multimedia;
use App\Http\Resources\MultimediaResource;

class ProductMediaController extends Controller
{

    public function list(Product $product) {
        return MultimediaResource::collection($product->medias);
    }

    public function store(Request $request, Product $product) {
        $multimedia = Multimedia::findOrFail($request->input('media_id'));
        $exists = $product->medias()->where('multimedia_id', $multimedia->id)->count();

        if ($exists > 0) {
            return response()->json([
                'error' => 'El elemento multimedia ya existe en ese producto',
                'multimedia' => $multimedia
            ], 409);
        }

        $product->medias()->save($multimedia, [
            'order' => $product->medias()->count()
        ]);
        return $multimedia;
    }
}
