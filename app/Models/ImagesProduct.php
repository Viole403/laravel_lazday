<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class ImagesProduct extends Model
{
    protected $table = 'images_product';
    protected $guarded = ['id'];

    public function productRelation()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
