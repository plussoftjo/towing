<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubService extends Model
{
    public function Service() {
        return $this->belongsTo('App\Service','service_id','id');
    }
}
