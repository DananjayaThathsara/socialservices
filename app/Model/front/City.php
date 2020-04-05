<?php

namespace App\Model\front;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function servies()
    {
        return $this->hasMany(service::class,'id');
    }
}
