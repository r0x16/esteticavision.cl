<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MultimediaResource extends Resource
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
            'src' => $this->src,
            'thumbnail' => $this->thumbnail,
            'type' => $this->getType()
        ];
    }

    private function getType() {
        return $this->type == 0 ? 'image': 'youtube';
    }
}
