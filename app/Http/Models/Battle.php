<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

    public function teams()
    {
    	return $this->belongsToMany(Team::class);
    }

    public function hoods()
    {
    	return $this->belongsToMany(Hood::class);
    }
}
