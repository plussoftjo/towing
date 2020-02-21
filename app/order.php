<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $with = ['order_info'];
    protected $fillable = ['user_id','driver_id','state','uuid'];

    public function order_info() {
        return $this->hasOne('App\order_info');
    }

    public function User() {
        return $this->belongsTo('App\User');
    }
}
