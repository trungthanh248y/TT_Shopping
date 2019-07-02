@extends('master')
@section('title','Manage Comments')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ __('List Comment') }}</h1>
            </div>
            <hr>
            <div class="col-6">
            </div>

            <table class="table">
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
                        <td><a href="{{Route('editProduct', $comment['product']['id'])}}">{!! $comment['product']['name'] !!}</a></td>
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
@endsection
