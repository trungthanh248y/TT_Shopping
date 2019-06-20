@extends('master')
@section('title','edit product')
@section('content')
    <div class="container">
        <h3><p>{{ __('EDIT PRODUCT') }}</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        <form action="{!! Route('updateProduct',$product->id) !!}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <label>{{ __('Name') }}</label>
            <input type="text" name="name" value="{!! $product->name !!}" class="form-control">

            <label>{{ __('Description') }}</label>
            <input type="text" name="description" value="{!! $product->description !!}" class="form-control">

            <label>{{ __('Unit Price') }}</label>
            <input type="text" name="unit_price" value="{!! $product->unit_price !!}" class="form-control">

            <label>{{ __('Category') }}</label>
            <select name="id_category">
                @foreach($categories as $category)
                    <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                @endforeach
            </select>

            <label>{{ __('Event') }}</label>
            <select name="id_event">
                @foreach($events as $event)
                    <option value="{!! $event->id !!}">{!! $event->name !!}</option>
                @endforeach
            </select>
            <br>
            <input class="btn btn-success" value="Update Product" type="submit" name="btnsubmit">
            <a class="btn btn-danger" href="{!! Route('indexProduct') !!}">{{ __('EXIT') }}</a>
        </form>
    </div>
@endsection
