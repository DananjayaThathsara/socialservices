<?php

namespace App\Model\admin;

use App\Model\front\Service;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function services()
    {
        return $this->hasMany(Service::class, 'cat_id');
    }
}
