<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\CategoryWebpage;
use App\Category;
use Illuminate\Http\Request;

class CategoryWebpageController extends Controller
{

    /**
     * Asocia una nueva página web a la categoría especificada
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $webpage = new CategoryWebpage;
        $webpage->active = $request->active;
        $webpage->body = $request->body;

        $category->webpage()->save($webpage);
        return $webpage;
    }

    /**
     * Retorna la página web asociada a una categoría.
     *
     * @param  \App\CategoryWebpage  $categoryWebpage
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category->webpage;
    }

    /**
     * Actualiza la página web de la categoría asociada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryWebpage  $categoryWebpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $webpage = $category->webpage;
        $webpage->active = $request->active;
        $webpage->body = $request->body;
        $webpage->save();
        return $webpage;
    }
}
