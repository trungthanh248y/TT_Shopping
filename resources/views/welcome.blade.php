@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            Khách hàng
        </div>
        <div class="col-md-2">
            <a href="{{Route('manage')}}">{{ __('trang nhân viên &raquo') }}</a>
        </div>
    </div>
@endsection
