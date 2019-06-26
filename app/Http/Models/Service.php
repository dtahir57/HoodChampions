<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Service extends Model
{
    public function hood()
    {
    	return $this->belongsTo(Hood::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
