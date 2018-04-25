<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Show Category page, including category webpage model and all products
     *
     * @param Category $category
     * @return string
     */
    public function index(Category $category) {
        return view('category', [
            'category' => $category,
            'products' => $category->products()->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
