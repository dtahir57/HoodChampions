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
}
