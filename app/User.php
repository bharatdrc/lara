<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const DEFAULT_PASSWORD = 'Drc@1234';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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

    public function person()
    {
        return $this->hasOne('App\Person','user');
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'role_user', 'user_id', 'role_id');
    }

     /**
     * The person that belong to the country.
     */
    public function participants()
    {
        return $this->hasMany('App\EventParticipation','user_id');
    }

    /**
     * The person that belong to the country.
     */
    public function stores()
    {
        return $this->hasMany('App\Store','user_id');
    }
}
