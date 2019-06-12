@extends('master')
@section('title','Manage Products')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ __('List Products') }}</h1>
            </div>
            <hr>
            <div class="col-6">
                <a class="btn btn-success" href="{{Route('addProduct')}}">{{ __('ADD') }}</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Description') }}</th>
                    <th scope="col">{{ __('Unit_price')}}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{!! $product->id !!}</th>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->description !!}</td>
                        <td>{!! $product->unit_price !!}</td>
                        <td>
                            <a class="btn btn-info" href="{!! Route('editProduct',$product->id) !!}">{{ __('Edit') }}</a>
                            <form action="{!! Route('deleteProduct') !!}" method="post">
                                <input type="hidden" name="product_id" value="{!! $product->id !!}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
