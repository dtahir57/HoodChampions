<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categoryable()
    {
    	return $this->morphTo();
    }
}
