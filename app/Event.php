<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table="events";
    protected $guarded=['id'];
    public function products(){
        return $this->hasMany('App\Product','id_event','id');
    }
}
