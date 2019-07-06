<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hood extends Model
{
    /**
     * [users description]
     * @return [type] [description]
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    /**
     * [services description]
     * @return [type] [description]
     */
    public function services()
    {
    	return $this->hasMany(Service::class);
    }
    /**
     * [teams description]
     * @return [type] [description]
     */
    public function teams()
    {
    	return $this->hasMany(Team::class);
    }
    /**
     * [interest_groups description]
     * @return [type] [description]
     */
    public function interest_groups()
    {
        return $this->hasMany(InterestGroup::class);
    }
    /**
     * [activities description]
     * @return [type] [description]
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    /**
     * [lost_and_founds description]
     * @return [type] [description]
     */
    public function lost_and_founds()
    {
        return $this->hasMany(LostAndFound::class);
    }
    /**
     * [region description]
     * @return [type] [description]
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    /**
     * [battles description]
     * @return [type] [description]
     */
    public function battles()
    {
        return $this->hasMany(Battle::class);
    }
}
