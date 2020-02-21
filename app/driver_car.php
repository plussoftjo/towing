<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver_car extends Model
{
    protected $fillable = ['user_id','car_type','car_no','services'];


    public function User() {
        return $this->belongsTo('App\User');
    }
}
