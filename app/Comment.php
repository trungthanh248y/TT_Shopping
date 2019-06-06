<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comments";
    protected $guarded=['id'];
    public function products(){
        return $this->belongsTo('App\Product','id_product','id');
    }
}
