@extends('layouts.app_admin')
@section('content')
    <body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ __('Table') }}
            @if(session('mes_del'))
                <p class="alert alert-success">{{session('mes_del')}}</p>
            @endif
        </h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form class="d-none d-sm-inline form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
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
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Content') }}</th>
                            <th scope="col">{{ __('Product') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <th scope="row">{!! $comment['id'] !!}</th>
                                <td>{!! $comment['content'] !!}</td>
                                <td>{!! $comment['product']['name'] !!}</td>
                                <td>
                                    <form action="{!! Route('deleteComment') !!}" method="post">
                                        <input type="hidden" name="comment_id" value="{!! $comment['id'] !!}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger">
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
