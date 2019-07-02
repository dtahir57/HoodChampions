<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function interest_groups()
    {
    	return $this->hasMany(InterestGroup::class);
    }

    public function activities()
    {
    	return $this->hasMany(Activity::class);
    }
    
    public function lost_and_founds()
    {
        return $this->hasMany(LostAndFound::class);
    }
}
