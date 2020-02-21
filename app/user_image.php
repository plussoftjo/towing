<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_image extends Model
{
    protected $fillable = ['user_id','type','image'];

    public function User() {
        return $this->belongsTo('App\User');
    }
}
