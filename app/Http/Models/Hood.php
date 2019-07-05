<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hood extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function services()
    {
    	return $this->hasMany(Service::class);
    }

    public function teams()
    {
    	return $this->hasMany(Team::class);
    }

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

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
