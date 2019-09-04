<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\Product;


class Cart extends Model
{
    //
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        //product->event hay có thể hiểu item->event mới lấy ra được promotion_price
        $ProductEvent = Event::find($item->id_event)->promotion_price;
        $donGia = $item->unit_price - (($ProductEvent * $item->unit_price) / 100);
        if ($item->id_event == null) {
            $giohang = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item];
        } else {
            $giohang = ['qty' => 0, 'price' => $donGia, 'item' => $item];
        }
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giohang = $this->items[$id];
            }
        }

        $giohang['qty']++;

        if ($item->id_event == null) {
            $item['price'] = $item->unit_price * $giohang['qty'];
        } else {
            $item['price'] = $donGia * $giohang['qty'];
        }
        $this->items[$id] = $giohang;
        $this->totalQty++;
        if ($item->id_event == null) {
            $this->totalPrice += $item->unit_price;
        } else {
            $this->totalPrice += $donGia;
        }

    }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
