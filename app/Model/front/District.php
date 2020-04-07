<?php

namespace App\Model\front;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public  function cities(){

        return $this->hasMany(City::class,'d_id');
    }
    public function servies()
    {
        return $this->hasMany(service::class,'id');
    }
}
