<?php

namespace App\Contracts;

use App\Contracts\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function CategoryParentAll();
    public function getSearch($request);
}
