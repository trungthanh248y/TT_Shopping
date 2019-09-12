<?php

namespace App\Contracts;

use App\Contracts\RepositoryInterface;

interface RepositoryBill extends RepositoryInterface
{
    public function SaveBillDetail($arr);
}
