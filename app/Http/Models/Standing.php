<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
	/**
	 * [battle description]
	 * @return [type] [description]
	 */
    public function battle()
    {
    	return $this->belongsTo(Battle::class);
    }
    /**
     * [team description]
     * @return [type] [description]
     */
    public function team()
    {
    	return $this->belongsTo(Team::class);
    }
    /**
     * [hood description]
     * @return [type] [description]
     */
    public function hood()
    {
    	return $this->belongsTo(Hood::class);
    }
}
