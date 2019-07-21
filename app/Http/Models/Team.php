<?php

namespace App\Http\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\withPivot;

class Team extends Model
{
    /**
     * [hood description]
     * @return [type] [description]
     */
    public function hood()
    {
    	return $this->belongsTo(Hood::class);
    }
    /**
     * [users description]
     * @return [type] [description]
     */
    public function users()
    {
    	return $this->belongsToMany(User::class)->withPivot('is_captain');
    }
    /**
     * [battles description]
     * @return [type] [description]
     */
    public function battles()
    {
    	return $this->belongsToMany(Battle::class);
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
