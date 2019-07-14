<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    /**
     * Each Battle belongs to particular Category
     * @return [type] [description]
     */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

    /**
     * Battles has many teams
     * @return [type] [description]
     */
    public function teams()
    {
    	return $this->belongsToMany(Team::class);
    }

    /**
     * Each Battle belongs to particular hood
     * @return [type] [description]
     */
    public function hoods()
    {
    	return $this->belongsTo(Hood::class);
    }

    /**
     * [standings description]
     * @return [type] [description]
     */
    public function standings()
    {
        return $this->hasMany(Standing::class);
    }
}
