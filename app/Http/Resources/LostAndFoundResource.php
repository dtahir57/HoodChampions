<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class LostAndFoundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hood_id' => $this->hood_id,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'image' => Storage::url($this->image)
        ];
    }
}
