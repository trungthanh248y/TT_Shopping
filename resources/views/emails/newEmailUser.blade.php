{{--@component('mail::message')--}}
    <html>

    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

    <h1>{{ __('Đặt hàng') }} </h1>
    {{ __('Cảm ơn bạn') }} <strong>{{ $bill->users->name }}</strong> {{ __('đã sử dụng dịch vụ của chúng tôi. Nhân viên sẽ liên hệ với bạn qua địa chỉ') }} <strong>{{ $bill->users->email }}</strong>{{ __('sơm nhất có thể') }}
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{ __('Product') }}</th>
            <th></th>
            <th>{{ __('Quantity') }}</th>
            <th></th>
            <th class="text-center">{{ __('Price') }}</th>
            <th></th>
            <th></th>
            <th class="text-center">{{ __('Total') }}</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        @if(Session::has('cart'))
            @foreach($product_cart as $product)
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <div class="media-body">
                                <br>
                                <h4 class="media-heading"><a href="#">{{ $product['item']['name'] }}</a></h4>
                                <span>{{ __('Status:') }}</span><span class="text-success"><strong>{{ __('Sending') }}</strong></span>
                                <input type="hidden" name="status" value="sending">
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <strong>{{$product['qty']}}</strong>
                    </td>
                    <td></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{ $product['item']['price'] }}</strong></td>
                    <td></td><td></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{ $product['item']['price']*$product['qty'] }}</strong></td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><h3>{{ __('Total Price') }}</h3></td>
                <td class="text-left"><h3><strong>{{ number_format(Session('cart')->totalPrice) }}</strong></h3></td>
            </tr>
        @endif
        </tbody>
    </table>

    <h3>{{ __('Ngày đặt hàng:') }} {{ $bill->users->created_at }}</h3>
    {{ __('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi') }}<br>
    <h2>{{ __('Website bán hàng băng bố già') }}</h2>

    </html>
{{--@endcomponent--}}
