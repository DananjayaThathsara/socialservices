<?php

namespace App\Model\front;

use App\Model\admin\Category;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class, 'c_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
