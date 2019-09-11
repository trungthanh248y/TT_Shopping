<?php

namespace App\Contracts;
interface HomeRepositoryInterface extends RepositoryInterface
{
    public function getEventImageOfProduct();

    public function getEventImageOfProductDetail($id);
}
