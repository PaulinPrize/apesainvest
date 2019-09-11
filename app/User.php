<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use Notifiable,ShinobiTrait;  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password','photo','telephone','provider_id','pays','ville','last_login_at','last_login_ip','banned_until',
    ];

    protected $dates = [
        'banned_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Pour savoir si un utilisateur est en ligne */
    public function isOnline(){
        return Cache::has('user-is-online-' .$this->id);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function projets(){
        return $this->hasMany(Projet::class);
    }
}
