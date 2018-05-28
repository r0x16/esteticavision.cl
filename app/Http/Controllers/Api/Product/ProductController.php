<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(9));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response('Not available', 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->code = $request->input('code');
        $product->slug = $this->getValidSlug($request->input('name'));
        $product->category_id = $request->input('category');

        if ($request->input('brand') != 0) {
            $product->brand_id = $request->input('brand');
        }

        \DB::transaction(function() use($product, $request) {
            $product->save();

            foreach ($request->input('tags') as $tag) {
                $product->tags()->save($this->getTag(strtolower($tag)));
            }
        });

        return $product;
    }

    /**
     * Obtiene un slug válido para un producto basado en su nombre.
     * Dos productos no deberían tener el mismo slug,
     * pero no elimina el hecho de que 2 productos podrían tener el mismo nombre.
     *
     * @param string $name
     * @return string
     */
    private function getValidSlug($name) {
        $base_slug = str_slug($name);
        $suffix = '';
        $index = 0;
        while(Product::where('slug', $base_slug.$suffix)->count() > 0) {
            $index++;
            $suffix = '-'.str_pad($index, 3, "0", STR_PAD_LEFT);
        }
        return $base_slug.$suffix;
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->loadMissing(['tags','brand','category']);

        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return response('Not available', 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->code = $request->input('code');
        $product->slug = $this->getValidSlug($request->input('name'));
        $product->category_id = $request->input('category');

        if ($request->input('brand') != 0) {
            $product->brand_id = $request->input('brand');
        } else {
            $product->brand_id = null;
        }

        $product->save();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Update all product on a category
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request) {
        $old_category = Category::findOrFail($request->input('old_category_id'));
        $new_category = Category::findOrFail($request->input('new_category_id'));

        $affected = $old_category->products()->update(['category_id' => $new_category->id]);

        return [
            'affected' => $affected
        ];
    }
}
