<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Searchy;
use App\Product;
use App\Category;

class SearchController extends Controller
{
    public function index(Request $request) {
        $query = $request->query('q');
        $results = Searchy::products('name', 'description')
                    ->query($query)
                    ->select('id', 'category_id')
                    ->get();
        $ids = $this->getIds($results);
        $categories = $this->getCategories($results);

        $products = Product::whereIn('id', $ids)->with(['medias' => function($query) {
            $query->where('type', 0);
        }]);

        if($request->has('category')) {
            $products->whereIn('category_id', $request->category);
        }
        
        return view('search', [
            'query' => $query,
            'products' => $products->paginate(15),
            'categories' => $categories,
            'categories_filtered' => $request->query('category', [])
        ]);
    }

    private function getIds($result) {
        $data = [];
        foreach($result as $r) {
            $data[] = $r->id;
        }
        return $data;
    }

    private function getCategories($result) {
        $data = [];
        foreach($result as $r) {
            $data[] = $r->category_id;
        }
        return Category::whereIn('id', $data)->get();
    }
}
