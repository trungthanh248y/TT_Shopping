@extends('layouts.app_admin')
@section('content')
    <body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ __('Table') }}
            @if(session('mes_del'))
                <p class="alert alert-success">{{session('mes_del')}}</p>
            @endif
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form class="d-none d-sm-inline form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
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
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('Unit_price')}}</th>
                            <th scope="col">{{ __('ADD') }}</th>
                            <th scope="col">{{ __('EDIT') }}</th>
                            <th scope="col">{{ __('DELETE') }}</th>

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
                                    <a class="btn btn-success" href="{{Route('addProduct')}}">{{ __('+') }}</a>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{!! Route('editProduct',$product->id) !!}">{{ __('+') }}</a>
                                </td>
                                <td>
                                    <form action="{!! Route('deleteProduct') !!}" method="post">
                                        <input type="hidden" name="product_id" value="{!! $product->id !!}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" value="+" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                           <div>{{ $products->links() }}</div>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>

    </div>
    </body>
@endsection
