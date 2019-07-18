@extends('layouts.app')

@section('title','Order')

@section('content')
    <div class="cart-total text-right">Tong Tien: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}</span></div>
    <div class="cart-total text-right">So Luong: <span class="cart-total-value">{{number_format(Session('cart')->totalQty)}}</span></div>
    <?php dd($product_cart) ?>
@endsection