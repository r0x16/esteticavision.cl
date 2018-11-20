<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\CarouselItem;
use App\Multimedia;
use Illuminate\Http\Request;

class CarouselItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarouselItem::with('multimedia')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new CarouselItem;
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->multimedia_id = $request->input('multimedia');
        $item->save();

        return $item;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarouselItem  $carouselItem
     * @return \Illuminate\Http\Response
     */
    public function show(CarouselItem $carouselItem)
    {
        return $carouselItem->load('multimedia');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarouselItem  $carouselItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarouselItem $carouselItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarouselItem  $carouselItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($carouselItem)
    {
        CarouselItem::find($carouselItem)->delete();
        return $carouselItem;
    }
}
