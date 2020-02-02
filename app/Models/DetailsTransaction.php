<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsTransaction extends Model
{
    protected $table = 'details_transactions';
    protected $guarded = ['id'];

    public function productRelation()
    {
        return $this->hasOne(\App\Models\Product::class, 'id', 'product_id');
    }
}
