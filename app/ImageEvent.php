<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ImageEvent extends Model
{
    protected $table = "image_events";
    protected $guarded = ['id'];
    public function products()
    {
        return $this->hasMany('App\Product', 'id_event', 'id');
    }
}
