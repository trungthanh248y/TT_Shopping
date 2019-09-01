<?php

namespace App\Contracts;

use App\Contracts\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function allEvent();

    public function allCategory();

    public function storeProductImage($v, $product_id);

    public function deleteProductImage($id);

    public function DisplayProductImage($id);

    public function DisplayProductEvenCategory($id);

    public function ShowPromotion_price($id);

    public function ShowProductComments($id);

    public function ShowProductCategory($id);

    public function ShowEvent($id);

    public function getSearch($request);
}