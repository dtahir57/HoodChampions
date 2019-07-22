<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BattleResource extends JsonResource
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
            'max_no_of_teams' => $this->max_no_of_teams,
            'description' => $this->description,
            'about_us' => $this->about_us,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'meetup_place' => $this->meetup_place,
            'image' => Storage::url($this->image),
            'is_featured' => $this->is_featured
        ];
    }
}
