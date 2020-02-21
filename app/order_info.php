<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_info extends Model
{
    protected $fillable = ['order_id','car_type','service','sub_service','amount','note','latlng_user','latlng_distance'];
}
