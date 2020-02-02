<?php

namespace App\Models;

use DB;
use App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['id'];

    public function scopeGetCode($query)
    {
        //TR00001
        $string = "TR";
        //0
        $selectLastCode = DB::raw(" coalesce( MAX( CAST( RIGHT( transaction_code, 5) AS UNSIGNED  ))  ,0) as code ");
        $getData = $query->select($selectLastCode)->where('transaction_code', 'LIKE', '%' . $string . '%')->first();
        $number = sprintf("%'.05d ", $getData->code + 1);
        //00001
        return $string . $number;
    }

    public function detailTransaction()
    {
        return $this->hasMany(DetailsTransaction::class, 'transaction_id', 'id');
    }

    public function userRelations()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
