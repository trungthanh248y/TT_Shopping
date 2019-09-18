@extends('layouts.app_admin')
@section('content')
    <body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ __('List Bills') }}
            @if (session('mes_del'))
                <p class="alert alert-success">{{ session('mes_del') }}</p>
            @endif
        </h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form action="{{ Route('searchCategory') }}" class="d-none d-sm-inline form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="key" class="form-control bg-light small" placeholder="{{ __('Search for...') }}"
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Người mua hàng') }}</th>
                            <th scope="col">{{ __('Tên sản phẩm') }}</th>
                            <th scope="col">{{ __('Số lượng') }}</th>
                            <th scope="col">{{ __('Tổng tiền') }}</th>
                            <th scope="col">{{ __('Hình thức thanh toán') }}</th>
                            <th scope="col">{{ __('Trạng thái') }}</th>
                            <th scope="col">{{ __('Thời gian đặt hàng') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <th scope="row">{!! $bill->id !!}</th>
                                <td>{{ $nameUser }}</td>
                                <td>{{ $nameProduct }}</td>
                                <td>{!! $bill->quantity !!}</td>
                                <td>{!! $totalBill !!}</td>
                                <td>{{ $paymentBill }}</td>
                                <td>{{ $statusBill }}</td>
                                <td>{{ $bill->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection


