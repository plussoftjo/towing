<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdrawl extends Model
{
    protected $fillable = ['user_id','uid','amount','note','method'];
    public function User() {
        return $this->belongsTo('App\User');
    }
}
