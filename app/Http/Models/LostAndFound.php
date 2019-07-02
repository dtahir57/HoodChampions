<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class LostAndFound extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function hood()
    {
    	return $this->belongsTo(Hood::class);
    }
}
