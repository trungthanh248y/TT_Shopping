@extends('layouts.app')
@section('content')

    <body>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('name') }}</th>
            <th scope="col">{{ __('email') }}</th>
            <th scope="col">{{ __('password') }}</th>
            <th><a href="{{Route('createManage')}}" class="btn btn-success">{{ __('Add') }}</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>
                <a href="{{Route('editManage',$user->id)}}" class="btn btn-info">{{ __('Edit') }}</a>
                <form action='{{Route('destroyManage',$user->id)}}' method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
