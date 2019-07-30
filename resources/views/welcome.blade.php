@extends('layouts.app_user')
@section('content')
    <body>
    <!-- Start slider -->

    <!-- / slider -->
    <!-- Start Promo section -->
    <!-- / Promo section -->
    <!-- Products section -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->

                        <!-- single slide item -->
                        @foreach($events as $event)
                            <li>
                                <div class="seq-model">
                                    <img data-seq src="https://media3.scdn.vn/img3/2019/7_2/0rZkJz.png"
                                         alt="Male Female slide img"/>
                                </div>
                                <div class="seq-title">
                                    <span data-seq>{{ $event->promotion_price }}</span>
                                    <h2 data-seq>{{ $event->name }}</h2>
                                    <p data-seq>{{ __('Ngày kết thúc:') }} {{ $event->end_promotion }}</p>
                                    <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">{{ __('SHOP NOW') }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>

{{--    gioi hang--}}
{{--    <div class="beta-comp">--}}
{{--        <div class="cart">--}}
{{--            <div class="beta-select"><i class="fa fa-shopping-cart"></i>--}}
{{--                    Gio Hang(@if(Session::has('cart')){{Session('cart')->totalQty}})<i class="fa fa-chevron-down">--}}
{{--                    @else Trong) @endif--}}
{{--                    </i></div>--}}
{{--                    @if(Session::has('cart'))--}}
{{--                    @foreach($product_cart as $product)--}}
{{--                        <div class="cart-item">--}}
{{--                            --}}{{--                                                    nut xoa khoi gio hang--}}

{{--                            <a href="{{Route('xoagiohang',$product['item']['id'])}}" class="cart-item-delete">--}}
{{--                                <i class="fa fa-times">Xoa gio hang</i></a>--}}

{{--                            --}}{{--                                                    ket thuc nut xoa gio hang--}}
{{--                            <div class="media">--}}
{{--                                <a href="#" class="pull-left"><img style="width: 72px; height: 72px" src="{{asset('images/'.((count($product['item']->images)>0)?($product['item']->images[0]['name']):null))}}" alt=""></a>--}}
{{--                                <div class="media-body">--}}
{{--                                    <span class="cart-item-title">{{$product['item']['name']}}</span>--}}
{{--                                    <span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']->event == null)--}}
{{--                                                {{number_format($product['item']['unit_price'])}}@else{{number_format($product['item']->event['promotion_price'])}}@endif--}}
{{--                                            (<span>{{$product['item']['id_event']}}</span>)</span></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                        <div class="cart-caption">--}}
{{--                            <br>--}}
{{--                            <div class="cart-total text-right">Tong Tien: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}</span></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                            <div class="center">--}}
{{--                                <div class="space10">&nbsp;</div>--}}
{{--                                <a href="{{Route('getOrder')}}" class="beta-btn primary text-center">Dat Hang <i class="fa fa-chevron-right"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--        </div>--}}
{{--            <br>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    Ket thuc gioi hang--}}

    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">

                                    <li><a data-toggle="tab">{{ __('men') }}</a></li>

                                    <!-- category -->
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    <div class="tab-pane fade in active" id="men">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            @foreach($products as $product)
                                                <li>
                                                    <figure>

                                                        <a class="aa-product-img" href="#"><img style="width: 250px;height: 250px" src="{{asset('images/'.((count($product->images)>0)?($product->images[0]['name']):null))}}"
                                                                                                alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="{{Route('themgiohang',$product->id)}}"><span
                                                                    class="fa fa-shopping-cart"></span>{{ __('Add To Cart') }}</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                                                            <span class="aa-product-price">{{number_format($product->unit_price)}}$</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/>
                                                                <span class="aa-product-price"><del>{{number_format((($product->event['promotion_price'])!=0)?($product->event['promotion_price']):($product->unit_price))}}</del></span></svg>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                           title="View" data-toggle="modal"
                                                           data-target="#quick-view-modal"><span
                                                                    class="fa fa-search"></span></a>
                                                    </div>
                                                    <!-- product badge -->
                                                    <span class="aa-badge aa-hot" href="#">{{ __('HOT') }}!</span>

{{--                                                    nut them vao gio hang--}}

{{--                                                            <div class="single-item-caption">--}}
{{--                                                                <a href="{{Route('themgiohang',$product->id)}}" class="add-to-cart pull-left">--}}
{{--                                                                    <i class="fa fa-shopping-cart">Them gio hang</i></a>--}}
{{--                                                            </div>--}}

{{--                                                    ket thuc nut them vao gioi hang--}}

                                                </li>
                                        @endforeach
                                        <!-- start single product item -->
                                        </ul>
                                        {{$products->links()}}
                                    </div>
                                    <!-- / men product category -->
                                    <!-- start women product category -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->
    <!-- banner section -->
    <!-- popular section -->
    <!-- / popular section -->
    <!-- Support section -->
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
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.400282169938!2d105.77970851446364!3d21.01666389356815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d69594b35%3A0x56c7da1281efdc2f!2zSGFuZGljbyBUb3dlciAtIERITO2KueyGoSDsiJjroLnsp4A!5e0!3m2!1svi!2s!4v1563279832958!5m2!1svi!2s" width="800" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>                                                </a></li>
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
    <!-- / footer -->
    </body>
@endsection

