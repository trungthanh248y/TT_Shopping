<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    //
    protected $table = "products";
    protected $guarded = ['id'];

    use SearchableTrait;
    use Notifiable;

    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 6,
            'products.unit_price' => 8,
//            'bill_detail.quantity' => 10,
//            'bill_detail.id' => 5,
        ],
        'joins' => [
          'bill_detail' => ['products.id','bill_detail.id_product'],
        ],
    ];

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

