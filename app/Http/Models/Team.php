<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Team extends Model
{
    public function hood()
    {
    	return $this->belongsTo(Hood::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
