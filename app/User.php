<?php

namespace App;

use App\Http\Models\Activity;
use App\Http\Models\Battle;
use App\Http\Models\Hood;
use App\Http\Models\InterestGroup;
use App\Http\Models\LostAndFound;
use App\Http\Models\Service;
use App\Http\Models\Team;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\Concerns\withPivot;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone_number', 'date_of_birth', 'hood_id', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hood()
    {
        return $this->belongsTo(Hood::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot('is_captain');
    }

    public function interest_groups()
    {
        return $this->belongsToMany(InterestGroup::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function lost_and_founds()
    {
        return $this->hasMany(LostAndFound::class);
    }
    public function battles() {
        return $this->belongsToMany(Battle::class);
    }
}
