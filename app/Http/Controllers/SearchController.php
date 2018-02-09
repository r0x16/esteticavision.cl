<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Searchy;
use App\Product;

class SearchController extends Controller
{
    public function index(Request $request) {
        $query = $request->query('q');
        $results = Searchy::products('name', 'description')
                    ->query($query)
                    ->select('id')
                    ->get();
        $ids = $this->getIds($results);

        $products = Product::whereIn('id', $ids)->with(['medias' => function($query) {
            $query->where('type', 0);
        }])->paginate(15);
        
        return view('search', [
            'query' => $query,
            'products' => $products
        ]);
    }

    private function getIds($result) {
        $data = [];
        foreach($result as $r) {
            $data[] = $r->id;
        }
        return $data;
    }
}
