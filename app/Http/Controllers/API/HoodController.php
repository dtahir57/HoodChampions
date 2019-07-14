<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Hood;
use App\Http\Resources\HoodResource;
use Illuminate\Http\Request;

class HoodController extends Controller
{
    public function hoods()
    {
    	$hoods = Hood::all();
    	return HoodResource::collection($hoods);
    }
}
