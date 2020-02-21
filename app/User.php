<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens,Notifiable;


    public $with = ['user_profile','user_car','user_card','driver_state','driver_car','order','wallet','user_company','user_image','withdrawl'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password','type','method','avatar','notifaction_token'
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

    public function user_profile() {
        return $this->hasOne('App\user_profile');
    }

    public function user_car() {
        return $this->hasMany('App\user_car');
    }

    public function user_card() {
        return $this->hasMany('App\user_card');
    }

    public function driver_state()
    {
        return $this->hasOne('App\driver_state');
    }

    public function driver_car() {
        return $this->hasOne('App\driver_car');
    }

    public function order() {
        return $this->hasMany('App\order');
    }

    public function wallet() {
        return $this->hasOne('App\wallet');
    }

    public function user_company() {
        return $this->hasOne('App\user_company');
    }

    public function user_image() {
        return $this->hasMany('App\user_image');
    }

    public function withdrawl() {
        return $this->hasMany('App\withdrawl');
    }
}
