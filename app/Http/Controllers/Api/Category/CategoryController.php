<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Log;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $fatherless = $request->input('fatherless');
        $supercategory = $request->input('supercategory_id');
        return Category
            ::when($fatherless, function ($query) {
                return $query->where('supercategory_id', null);
            })
            ->when($supercategory, function ($query) use($supercategory) {
                return $query->where('supercategory_id', $supercategory);
            })
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return response('Not available', 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $category = new Category;
        $category->name = $request->name;
        if ($request->father != 0) {
            $category->supercategory_id = $request->father;
        }
        $category->save();
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        return response('Not available', 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) {
        $category->name = $request->name;
        if ($request->father != 0) {
            $category->supercategory_id = $request->father;
        }
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        //
    }

    /**
     * Modifica la página de la categoría.
     * Esta se desplegará cuando el usuario final accedaa la url de esa categoría
     * en conjunto con el listado de productos.
     */
    public function updateWebPage(Request $request) {
        
    }
}
