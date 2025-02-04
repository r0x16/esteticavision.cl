<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CarouselItem;
use Setting;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', [
            'random_products' => $this->getRandomProducts(6),
            'carousel_items' => CarouselItem::with('multimedia')->get(),
            'welcome_message' => session()->has('welcome'),
            'home_banner' => Setting::get('homebanner')
        ]);
    }

    private function getRandomProducts(int $count) {
        return Product::inRandomOrder()->limit($count)->get();
    }
}
