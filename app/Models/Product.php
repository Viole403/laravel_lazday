<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];

    public function latestImage()
    {
        return $this->hasOne('App\Models\ImagesProduct','product_id', 'id')->latest();
    }

    public function imageRelation(){
        return $this->hasMany('App\Models\ImagesProduct','product_id', 'id');
    }
}
