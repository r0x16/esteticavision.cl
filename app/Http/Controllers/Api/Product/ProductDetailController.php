<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\ProductDetail;
use App\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        return $product->details;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $detail = new ProductDetail;
        $detail->name = $request->input('name');
        $detail->description = $request->input('description');

        $product->details()->save($detail);

        return $detail;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function show($productDetail)
    {
        return ProductDetail::findOrFail($productDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productDetail)
    {
	    $detail = ProductDetail::findOrFail($productDetail);
        $detail->name = $request->input('name');
        $detail->description = $request->input('description');

        $detail->save();

        return $detail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($productDetail)
    {
	$detail = ProductDetail::findOrFail($productDetail);
        return ['result' => $detail->delete()];
    }
}
