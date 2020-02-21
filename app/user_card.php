<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_card extends Model
{
    protected $fillable = ['user_id','number','date','cvc'];

    public function User() {
        return $this->belongsTo('App\User');
    }
}
