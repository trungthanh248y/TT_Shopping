@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            Khách hàng
        </div>
        <div class="col-md-2">
            <a href="{{Route('manage')}}">{{ __('trang nhân viên &raquo') }}</a>
        </div>
        <div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">unit_price</th>
                    <th scope="col">event</th>
                    <th scope="col">category</th>
                    <th scope="col">Shoping Cart</th>
                </tr>
                </thead>
                <tbody>
{{--                <form action="{{Route('addCart')}}" method="post">--}}
                    @foreach($products as $product)
                        <tr>
                        <th scope="row">{{$product['id']}}</th>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['description']}}</td>
                        <td>{{$product['unit_price']}}</td>
                        <td>{{$product['event']['name']}}</td>
                        <td>{{$product['category']['name']}}</td>
                        <td><a id="AddCart" href="{{Route('addCart',$product['id'])}}">ADD</a></td>
                        <td>
                            <form id="DeleteCart" action="{!! Route('deleteCart') !!}" method="post">
                                <input type="hidden" name="id" value="{{$product['id']}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                        </tr>
                    @endforeach
{{--                </form>--}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

