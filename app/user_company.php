<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_company extends Model
{
    protected $fillable = ['user_id','name','city','owner_name','phone','state','tax_id','zip_code'];

    public function User() {
        return $this->belongsTo('App\User');
    }
}
