@extends('layouts.app_user')
@section('content')
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                @if (count($product_image[0]['images']) == 0)
                                                    {{ __('no image') }}
                                                @else
                                                    @php $image = ($product_image[0]['images']);@endphp
                                                    <div class="simpleLens-big-image-container"><a
                                                                data-lens-image="{{ asset('images/'. $product_image[0]['images'][0]['name'] )}}"
                                                                class="simpleLens-lens-image"><img
                                                                    src="{{ asset('images/'. $product_image[0]['images'][0]['name'] )}}"
                                                                    class="simpleLens-big-image"></a></div>
                                                @endif
                                            </div>
                                            <div class="simpleLens-thumbnails-container">
                                                @if (count($product_image[0]['images']) == 0)
                                                    {{ __('no image') }}
                                                @else
                                                    @php $image = ($product_image[0]['images']);@endphp
                                                    @foreach ($image as $images)
                                                        <a data-big-image="{{ asset('images/'. ((count($product_image[0]['images'])!=0) ? ($images['name']): 'K co anh')) }}"
                                                           data-lens-image="{{ asset('images/'. ((count($product_image[0]['images'])!=0) ? ($images['name']): 'K co anh')) }}"
                                                           class="simpleLens-thumbnail-wrapper" href="#">
                                                            <img src="{{ asset('images/'. ((count($product_image[0]['images'])!=0) ? ($images['name']): 'K co anh')) }}"
                                                                 style="width: 50px; height: 50px">                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{$products->name}}</h3>
                                        <br>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price text-danger ">{{ __('Giá') }}: <del>{{$products->unit_price}}$</del></span>
                                        </div>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price text-danger ">{{ __('Giá khuyến mại') }}: {{($products->unit_price - $products->event['promotion_price']*$products->unit_price/100)}}$ </span>
                                        </div>
                                        <br>
                                        <div class="aa-prod-quantity">
                                            <form action="/action_page.php">
                                                <input class="text-danger" type="number" name="quantity" min="1"
                                                       max="10" value="1">
                                            </form>

                                            <div class="aa-prod-category">
                                                Category: <a
                                                        href="{{ Route('categorydetail', $categories_detail)}}">{{$products_category[0]['category']['name'] }}</a>
                                            </div>
                                        </div>
                                        <br><br><br><br>
                                        <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn"
                                               href="{{Route('themgiohang', $products['id'])}}">{{ __('Add To Cart') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li><a href="#description" data-toggle="tab">{{ __('Description') }}</a></li>
                                <li><a href="#review" data-toggle="tab">{{ __('Reviews') }}</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    <p>
                                    <h3><strong>{{ __('Thiết kế bền bỉ, chắc chắn') }}</strong></h3></p>
                                    <p>{{$products->name}} {{ __('mang tính di động với kích thước 25mm dành cho dòng laptop gaming') }}
                                        , {{$products->name}} {{ __('đem lại khả năng chơi game mạnh mẽ mọi lúc mọi nơi. Thiết kế bền bỉ với hợp kim magiê siêu bền bao bọc xung quanh khung máy đem lại độ cứng cáp tốt nhất và bề mặt bàn phím với chất liệu kim loại phay xước cho một cảm giác gõ phím mượt mà') }}</p>
                                    <p>
                                    <h3><strong>{{ __('Màn hình LED 15.6 inch Full HD, IPS') }}
                                        </strong></h3></p>
                                    <p>{{ __('Màn hình 15.6 inch với độ phân giải Full HD (1920 x 1080), công nghệ màn hình LED-Backlit mang đến những hình ảnh chất lượng, chi tiết, rõ nét, màu sắc cũng cực kỳ trung thực và sống động. Kết hợp màn hình IPS còn cung cấp góc nhìn lên tới 178 độ so với phương ngang, điều này có nghĩa là người dùng không nhất thiết phải ngồi trực diện vẫn có thể trải nghiệm hết chất lượng của hình ảnh, tấm nền chống chói Anti-glare giúp bạn có thể trải nghiệm tốt hơn ở môi trường bên ngoài, có khả năng chống chói tốt.') }}</p>
                                    @if (count($product_image[0]['images']) == 0)
                                        {{ __('no image') }}
                                    @else
                                        @php $image = ($product_image[0]['images']);@endphp
                                        <center><img
                                                    src="{{ asset('images/'. $product_image[0]['images'][0]['name'] )}}"
                                                   style="width: 750px;height: 450px">
                                        </center>                                    @endif
                                    <p>
                                    <h3><strong>{{ __('Bộ vi xử lý Intel Core i7') }}</strong></h3></p>
                                    <p>{{ __('Máy được trang bị bộ vi xử lý Intel Core i7-8750H với xung nhịp 4.1GHz, cho bạn những giây phút lướt web nhanh hơn, mạnh mẽ hơn. Bên cạnh đó, với bộ nhớ trong Ram 8GB DDR4 (2400MHz) đảm bảo xử lí các tác vụ đa nhiệm thật mượt mà và ổn định. Ngoài ra, máy còn trang bị thêm ổ cứng kép 1TB+128Gb SSD, cho bạn lưu trữ cũng như vận hành máy một cách nhanh chóng, mượt mà hơn.') }}</p>
                                    <p>
                                    <h3><strong>{{ __('Card đồ họa NVIDIA GeForce') }}</strong></h3></p>
                                    <p>{{ __('Máy được trang bị bộ vi xử lý Intel Core i7-8750H với xung nhịp 4.1GHz, cho bạn những giây phút lướt web nhanh hơn, mạnh mẽ hơn. Bên cạnh đó, với bộ nhớ trong Ram 8GB DDR4 (2400MHz) đảm bảo xử lí các tác vụ đa nhiệm thật mượt mà và ổn định. Ngoài ra, máy còn trang bị thêm ổ cứng kép 1TB+128Gb SSD, cho bạn lưu trữ cũng như vận hành máy một cách nhanh chóng, mượt mà hơn.') }}</p>
                                    <p>{{$products->description}}</p>
                                </div>
                                <div class="tab-pane fade " id="review">
                                    <div class="aa-product-review-area">
                                        <h4>{{count($comments)}} {{ __('Bình luận về') }} {{$products->name}}</h4>
                                        <ul class="aa-review-nav">
                                            @foreach($comments as $comment)
                                                <li>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object"
                                                                     src="https://postmediatorontosun.files.wordpress.com/2019/07/stephanie1000.jpg?quality=80&strip=all&w=412&h=458&crop=1"
                                                                     alt="girl image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <strong>@php echo(App\User::find($comment['id_user']) ? (App\User::find($comment['id_user'])->name) : 'manage') @endphp</strong>
                                                                - <span>{{$comment->created_at}}</span></h4>
                                                            <div class="aa-product-rating">
                                                            </div>
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <h4>{{ __('Add a review') }}</h4>
                                        <!-- review form -->
                                        @if(Auth::check())
                                            <form action="{{Route('addcomment', $products->id)}}" method="post"
                                                  class="aa-review-form">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <label for="message">{{ __('Your Review') }}</label>
                                                    <textarea class="form-control" rows="3" name="content"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-default aa-review-submit">
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Related product -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>{{ __('FREE SHIPPING') }}</h4>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fas fa-clock"></span>
                                <h4>{{ __('30 DAYS MONEY BACK') }}</h4>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>{{ __('SUPPORT 24/7') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->
    <!-- Testimonial -->
    <!-- / Testimonial -->

    <!-- Latest Blog -->
    <!-- / Latest Blog -->

    <!-- Client Brand -->
    <!-- footer -->
    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-9 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>{{ __('ADDRESS') }}</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="#">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.400282169938!2d105.77970851446364!3d21.01666389356815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d69594b35%3A0x56c7da1281efdc2f!2zSGFuZGljbyBUb3dlciAtIERITO2KueyGoSDsiJjroLnsp4A!5e0!3m2!1svi!2s!4v1563279832958!5m2!1svi!2s"
                                                            width="800" height="250" frameborder="0" style="border:0"
                                                            allowfullscreen></iframe>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>{{ __('Contact Us') }}</h3>
                                            <address>
                                                <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                                                <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                                            </address>
                                            <div class="aa-footer-social">
                                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                                <a href=""><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
    </footer>
@endsection

