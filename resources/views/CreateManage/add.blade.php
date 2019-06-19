@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ __('Add Manage') }}</h1>
    @if(count($errors)!=0)
        @foreach($errors->all() as $error)
            <p class=" alert alert-success ">{{ $error }}</p>
        @endforeach
    @endif
    @if(session('mess'))
        <p class="alert-success">{{session(' mess ')}}</p>
    @endif
    <div class="container">
        <form action="{{ Route('storeManage') }}" method="post" class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="text">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control">
            <label for="text">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control">
            <label for="text">{{ __('PassWord') }}</label>
            <input type="text" name="password" class="form-control">
            <input type="submit" value="{{ __('ADD') }}" class="btn btn-success">
        </form>
    </div>

@endsection
