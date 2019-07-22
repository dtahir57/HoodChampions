<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ServiceResource extends JsonResource
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
            'user_id' => $this->user_id,
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'image' => Storage::url($this->image)
        ];
    }
}
