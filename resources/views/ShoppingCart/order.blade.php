@extends('layouts.app')

@section('title','Order')

@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <form action="{{ route('postOrder') }}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('cart'))
                        @foreach($product_cart as $product)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"><img style="width: 72px; height: 72px" src="{{asset('images/'.((count($product['item']->images)>0)?($product['item']->images[0]['name']):null))}}" alt=""> </a>
                                    <div class="media-body">
                                        <br>
                                        <h4 class="media-heading"><a href="#">{{$product['item']['name']}}</a></h4>
                                        <span>Status: </span><span class="text-success"><strong>Sending</strong></span>
                                        <input type="hidden" name="status" value="sending">
                                    </div>
                                </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product['qty']}}" readonly="False">
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']['price']}}</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']['price']*$product['qty']}}</strong></td>
                            <td class="col-sm-1 col-md-1">
                                <a href="{{Route('xoagiohang',$product['item']['id'])}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove">Remove</span> </a>
                        </tr>
                        @endforeach
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total Price</h3></td>
                            <td class="text-right"><h3><strong>{{number_format(Session('cart')->totalPrice)}}</strong></h3></td>
                        </tr>
                    @endif
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <a href="{{Route('welcome')}}">
                                    Continue Shopping
                                </a>
                            </button>
                        </td>
                        @if(Auth::check())
                        <td>
                            <input type="submit" class="btn btn-success" value="Checkout">
                        </td>
                        @else
                            <td><a class="btn btn-success" href="{{ route('login') }}">{{ __('Login') }}</a></td>
                        @endif
                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>

@endsection