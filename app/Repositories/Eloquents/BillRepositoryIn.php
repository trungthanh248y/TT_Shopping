<?php

namespace App\Repositories\Eloquents;

use App\Bill;
use App\Bill_Detail;
use App\Cart;
use App\Contracts\RepositoryInterface;
use App\Contracts\RepositoryBill;

class BillRepositoryIn extends ElequentRepository implements RepositoryBill
{
    public function getModel()
    {
        return Bill::class;
    }

    public function SaveBillDetail($arr)
    {
        $billDetail = new Bill_Detail();
        return $billDetail->create($arr);
    }
}
