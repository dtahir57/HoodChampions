<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'title' => $this->title,
            'max_no_of_players' => $this->max_no_of_players,
            'description' => $this->description,
            'about_us' => $this->about_us,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'meetup_place' => $this->meetup_place,
            'image' => $this->image
        ];
    }
}
