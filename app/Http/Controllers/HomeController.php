<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', [
            'random_products' => $this->getRandomProducts(6)
        ]);
    }

    private function getRandomProducts(int $count) {
        return Product::inRandomOrder()->limit($count)->get();
    }
}
