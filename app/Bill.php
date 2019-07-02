<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bills";
    protected $guarded = ['id'];

    public function bills()
    {
        return $this->hasMany('App\Bill_Detail', 'id_bill', 'id');
    }
}
