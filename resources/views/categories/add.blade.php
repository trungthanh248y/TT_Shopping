@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ __('Add Categories') }}</h1>
    @if(isset($mess))
        <p class="alert alert-success">{!! $mess !!}</p>
    @endif
    @if(isset($errors))
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <div class="container">
        <form action="{{ Route('storeCategory') }}" method="post" class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="text">{{ __('Name') }}:</label>
            <input type="text" name="name" class="form-control">
            <label for="text">{{ __('Loại danh mục') }}:</label>
            <select name="id_parent">
                @foreach($categories as $category)
                    <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                @endforeach
                <option value="0">{{ __('Danh mục cha') }}</option>
            </select>
            <br>
            <input type="submit" value="{{ __('ADD') }}" class="btn btn-success">
        </form>
    </div>
@endsection
