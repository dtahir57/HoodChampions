<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Activity extends Model
{
    public function categories()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function hoods()
    {
    	return $this->belongsTo(Hood::class);
    }
}
