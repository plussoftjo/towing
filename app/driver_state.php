<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver_state extends Model
{
    protected $fillable = ['user_id','state','latlng'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
