@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ __('Edit Manage') }}</h1>
    @if(count($errors)!=0)
        @foreach($errors->all() as $error)
            <p class="alert alert-success ">{{ $error }}</p>
        @endforeach
    @endif
    @if(session('mess'))
        <p class="alert-success">{{ session('mess') }}</p>
    @endif
    <div class="container">
        <form action='{{Route('updateManage',$users->id)}}' method="post" class="form-group ">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="text">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{$users->name}}">
            <label for="text">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control" value="{{$users->email}}">
            <label for="text">{{ __('PassWord') }}</label>
            <input type="text" name="password" class="form-control" value="{{$users->password}}">
            <input type="submit" value="{{ __('Edit') }}" class="btn btn-success">
        </form>
    </div>
@endsection
