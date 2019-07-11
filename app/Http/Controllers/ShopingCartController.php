<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopingCartController extends Controller
{
    //
    public function add(Request $request, $id)
    {
        $arr = [];
        $arr[] = $id;
        return view('ShopingCart.home', compact('arr'));
    }

    public function delete(Request $request)
    {
        return $request->id;
    }
}
