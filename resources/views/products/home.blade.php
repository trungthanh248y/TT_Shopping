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
                <form action="{{Route('searchProduct')}}" class="d-none d-sm-inline form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="key" class="form-control bg-light small" placeholder="Search for..."
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
                <a class="btn btn-success" href="{{Route('addProduct')}}">{{ __('ADD') }}   <i class="fas fa-plus"></i></a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('Unit price')}}</th>
                            <th scope="col">{{ __('Event')}}</th>
                            <th scope="col">{{ __('Category')}}</th>
                            <th scope="col">{{ __('Image')}}</th>
                            <th scope="col">{{ __('EDIT') }}</th>
                            <th scope="col">{{ __('DELETE') }}</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{!! $product['id'] !!}</th>
                                <td>{!! $product['name'] !!}</td>
                                <td>{!! $product['description'] !!}</td>
                                <td>{!! $product['unit_price'] !!}</td>
                                <td>{!! $product['event']['name'] !!}</td>
                                <td>{!! $product['category']['name'] !!}</td>
                                <td>
                                    @if(count($product['images']) == 0)
                                        {{ __('no image') }}
                                    @else
                                        <?php $image=($product['images']);?>
                                        @foreach ($image as $images)
                                            <img class="img-rounded corners" style="width: 300px; height:100px" src="{{ asset('images/'.((count($product['images'])!=0) ? ($images['name']): 'K co anh')) }}" alt="">
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info"
                                       href="{!! Route('editProduct',$product['id']) !!}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{!! Route('deleteProduct') !!}" method="post">
                                        <input type="hidden" name="product_id" value="{!! $product['id'] !!}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" value="X" class="btn btn-danger">
                                    </form>
                                </td>
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

