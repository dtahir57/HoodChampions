<?php

namespace App\Http\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class InterestGroupPost extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function interest_group()
    {
    	return $this->belongsTo(InterestGroup::class);
    }
}
