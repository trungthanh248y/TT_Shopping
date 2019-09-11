<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\RepositoryBill;
use App\Mail\SendEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Bill;
Use App\Bill_Detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CreateShopingCartController extends Controller
{
    public $productRepository;
    public $billRepository;

    public function __construct(ProductRepositoryInterface $productRepository, RepositoryBill $billRepository)
    {
        $this->productRepository = $productRepository;
        $this->billRepository = $billRepository;
    }

    public function getAddtoCart(Request $request, $id)
    {
        $product = $this->productRepository->find($id);
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
            $arr['id_user'] = Auth::user()->id;
            $arr['total'] = $cart->totalPrice;
            $arr['status'] = $cart->status;
            $arr['payment'] = $cart->payment;
            $arr['created_at'] = date('Y-m-d H:i:s');
            $arr['updated_at'] = date('Y-m-d H:i:s');
            $new_bill = $this->billRepository->create($arr);
            $id = $new_bill->id;
            if ($id) {
                $mess = "{{ __('Đặt hàng thành công') }}";
                foreach ($cart->items as $k => $v) {
                    $bill_deatil['id_product'] = $k;
                    $bill_deatil['quantity'] = $v['qty'];
                    $bill_deatil['id_bill'] = $id;
                    $this->billRepository->SaveBillDetail($bill_deatil);
                }
                Mail::to(Auth::user()->email)->send(new SendEmail($new_bill));
                Session::forget('cart');

                return redirect()->route('welcome')->with('mess', $mess);
            }
        }
    }
}
