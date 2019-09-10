<?php

namespace App\Repositories\Eloquents;

use App\Contracts\ManageRepositoryInterface;
use App\Repositories\Eloquents;
use App\User;

class ManageRepository extends ElequentRepository implements ManageRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}