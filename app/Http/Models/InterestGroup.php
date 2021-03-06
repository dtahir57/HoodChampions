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
    	return $this->belongsToMany(User::class);
    }

    public function interest_group_posts()
    {
        return $this->hasMany(InterestGroupPost::class);
    }
}
