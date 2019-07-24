<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bills";
    protected $guarded = ['id'];

    public function bill_detail()
    {

        return $this->hasMany('App\Bill_Detail', 'id_bill', 'id');
    }
    public function users(){

        return $this->belongsTo('App\User','id_user','id');
    }
}
