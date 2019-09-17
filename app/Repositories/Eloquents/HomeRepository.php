<?php

namespace App\Repositories\Eloquents;

use App\Contracts\HomeRepositoryInterface;
use App\Event;
use App\Product;

class HomeRepository extends ElequentRepository implements HomeRepositoryInterface
{
    public function getModel()
    {
        return Event::class;
    }

    public function getEventImageOfProduct()
    {
        $products = Product::with
        (
            [
                'event' => function ($query) {
                    $query->select(['id', 'promotion_price']);
                },
                'images' => function ($query) {
                    $query->select(['id_product', 'name']);
                },
            ]
        )->get()->toArray();
        return $products;
    }

    public function getEventImageOfProductDetail($id)
    {
        $products = $product_image = Product::with
        (
            [
                'event' => function ($query) {
                    $query->select(['id', 'promotion_price']);
                },
                'images' => function ($query) {
                    $query->select(['id_product', 'name']);
                },
            ]
        )->where('id_category', '=', $id)->get()->toArray();
        return $products;
    }
}