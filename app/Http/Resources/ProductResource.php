<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\TagResource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'code' => $this->code,
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'brand' => $this->whenLoaded('brand'),
            'category' => $this->category,
            'created_at' => $this->created_at
        ];
    }
}
