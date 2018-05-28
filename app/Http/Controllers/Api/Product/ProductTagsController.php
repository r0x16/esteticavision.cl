<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use App\Product;

class ProductTagsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $tag = $this->getTag($request->input('name'));

        $product->tags()->save($tag);

        return $tag;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tag::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->input('name');
        $tag->save();

        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($request->input('product_id'));
        return ['result' => $product->tags()->detach($id)];
    }

    /**
     * Obtiene o crea un tag a partir del nombre
     *
     * @param string $name
     * @return App\Tag
     */
    private function getTag($name) {
        $db_tag = Tag::where('name', $name)->first();

        if ($db_tag) {
            return $db_tag;
        }

        $tag = new Tag;
        $tag->name = $name;
        $tag->save();

        return $tag;
    }
}
