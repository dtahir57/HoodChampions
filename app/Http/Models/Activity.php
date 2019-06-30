<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function category()
    {
    	return $this->morphOne(Category::class, 'categoryable');
    }
}
