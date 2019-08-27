<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    //
    protected $table = "products";
    protected $guarded = ['id'];
    public function bill_detail()
    {
        return $this->hasMany('App\Bill_Detail', 'id_product', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category', 'id');
    }
    public function images()
    {
        return $this->hasMany('App\Image', 'id_product', 'id');
    }
    public function event()
    {
        return $this->belongsTo('App\ImageEvent', 'id_event', 'id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_product', 'id');
    }
}

