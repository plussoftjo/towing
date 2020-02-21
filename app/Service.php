<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    public $with = ['SubService'];
    public function CarType() {
        return $this->belongsTo('App\CarType','car_types_id','id');
    }

    public function SubService() {
        return $this->hasMany('App\SubService','service_id','id');
    }
}
