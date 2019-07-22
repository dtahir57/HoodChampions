<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class InterestGroupResource extends JsonResource
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
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'about_us' => $this->about_us,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'meetup_place' => $this->meetup_place,
            'photo' => Storage::url($this->photo)
        ];
    }
}
