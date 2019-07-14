<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'planning_area_name' => $this->planning_area_name
        ];
    }
}
