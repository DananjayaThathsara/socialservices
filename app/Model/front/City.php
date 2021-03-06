<?php

namespace App\Model\front;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function servies()
    {
        return $this->hasMany(service::class,'id');
    }

    public function district(){

        return $this->belongsTo(District::class,'d_id');
    }

}
