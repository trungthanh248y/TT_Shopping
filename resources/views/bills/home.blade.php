@extends('master')
@section('title','Manage Bill')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ __('List Bills') }}</h1>
            </div>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Payment') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Total')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr>
                        <th scope="row">{!! $bill->id !!}</th>
                        <td>{!! $bill->payment !!}</td>
                        <td>{!! $bill->status !!}</td>
                        <td>{!! $bill->total !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
