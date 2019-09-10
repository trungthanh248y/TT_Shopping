<?php

namespace App\Repositories\Eloquents;
use App\Category;
use App\Contracts\CategoryRepositoryInterface;
use http\Env\Request;

class CategoryRepositoryIn extends ElequentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function CategoryParentAll()
    {
        return Category::all()->where('id_parent', '=', 0);
    }
    public function getSearch($request)
    {
        return Category::where('name', 'like', '%' . $request->key . '%')->get();
    }
}