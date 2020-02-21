<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $fillable=['user_id','net','all_time','withdrawal'];

    public function User() {
        return $this->belongsTo('App\User');
    }
}
