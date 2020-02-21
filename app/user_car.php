<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_car extends Model
{
    protected $fillable = ['user_id','model','car_make','car_model','car_color'];


    public function User() {
        return $this->belongsTo('App\User');
    }
}
