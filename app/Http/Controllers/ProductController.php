<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(Product $product) {
        // dd($product->medias);
        // dd($this->getCategoryChain($product->category));
        return view('product', [
            'product' => $product,
            'bradcrumb' => $this->getCategorychain($product->category),
            'canonical' => route('product', [
                'id' => $product->id,
                'slug' => $product->slug
            ])
        ]);
    }

    private function getCategoryChain(Category $category) {
        if(!$category->father) {
            return [$category];
        }
        $data = $this->getCategoryChain($category->father);
        array_push($data, $category);
        return $data;
    }
}
