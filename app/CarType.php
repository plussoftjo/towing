<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CarType extends Model
{
    public $with = ['Service'];
    public function Service() {
        return $this->hasMany('App\Service','car_types_id','id');
    }
}
