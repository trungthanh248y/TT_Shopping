
@extends('layouts.app_admin')
@section('content')
    <body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ __('Table') }}
            @if(session('mess'))
                <p class="alert alert-success">{{session('mess')}}</p>
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
                <a class="btn btn-success" href="{{Route('createManage')}}">{{ __('ADD') }} <i class="fas fa-user-plus"></i></a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Password') }}</th>
                            <th scope="col">{{ __('EDIT') }}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{!! $user->id !!}</th>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->password !!}</td>
                                <td>
                                    <a class="btn btn-info" href="{!! Route('editManage',$user->id) !!}"><i class="fas fa-user-edit"></i></a>
                                </td>
                                <td>
                                    <form action='{{Route('destroyManage',$user->id)}}' method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="submit" class="btn btn-danger" value="X">
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
