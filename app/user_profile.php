<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_profile extends Model
{
    protected $fillable = ['country','state','city','zip','address','user_id'];

    public function User() {
        return $this->belongsTo('App\User');
    }
}
