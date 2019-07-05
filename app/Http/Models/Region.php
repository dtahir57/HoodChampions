<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function hoods()
    {
    	return $this->hasMany(Hood::class);
    }
}
