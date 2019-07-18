<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Bill;
Use App\Bill_Detail;
use Illuminate\Support\Facades\Auth;


class CreateShopingCartController extends Controller
{
    //
    public function getAddtoCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getCheckout()
    {

        return view('ShoppingCart.order');
    }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');

        if (Auth::user()->id && count($cart->items)) {
            $bill = new Bill();
            $bill->id_user = Auth::user()->id;
            $bill->total = $cart->totalPrice;
            $bill->status = $request->status;
            $bill->payment = $request->payment;
            $bill->created_at = date('Y-m-d H:i:s');
            $bill->updated_at = date('Y-m-d H:i:s');
            if ($bill->save()) {
                foreach ($cart->items as $k => $v) {
                    $bill_detail = new Bill_Detail();
                    $bill_detail->id_bill = $bill->id;
                    $bill_detail->id_product = $k;
                    //Nếu muốn lưu đơn giá thay vì dd($cart) và tìm thì lên lấy ($v['price']/$v['qty']) nó sẽ đỡ giắc rối hơn
                    $bill_detail->quantity = $v['qty'];
                    $mess='Đặt hàng thành công';
                    if($bill_detail->save()){
                        Session::forget('cart');

                        return redirect()->back()->with('mess',$mess);
                    }
                }
            }
        }
    }
}
