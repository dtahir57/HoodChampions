<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class InterestGroup extends Model
{
    public function category()
    {
    	return $this->morphOne(Category::class, 'categoryable');
    }

    public function hood()
    {
    	return $this->belongsTo(Hood::class);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
