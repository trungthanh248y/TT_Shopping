@extends('layouts.app_user')
@section('content')
    <body>
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
                                    <img data-seq src="{{$event->image}}"
                                         alt="Male Female slide img"/>
                                </div>
                                <div class="seq-title">
                                    <h2 data-seq>{{ $event->name }}</h2>
                                    <p data-seq>{{ __('Ngày kết thúc:') }} {{ $event->end_promotion }}</p>
                                    <a data-seq href="{{Route('eventdetail',$event->id)}}"
                                       class="aa-shop-now-btn aa-secondary-btn">{{ __('SHOP NOW') }}</a>
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

    <!-- Start slider -->

    <!-- / slider -->
    <!-- Start Promo section -->
    <!-- / Promo section -->
    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">

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
                                                        @if(count($product['images']) == 0)
                                                            {{ __('no image') }}
                                                        @else
                                                            <?php $image=($product['images']);?>
                                                            <a class="aa-product-img" href="#"><img width="295"
                                                                                                    src="{{ asset('images/'. $product['images'][0]['name'] )}}"
                                                                                                    alt="polo shirt img"></a>
                                                            <a class="aa-add-card-btn" href="#"><span
                                                                        class="fa fa-shopping-cart"></span>{{ __('Add To Cart') }}</a>
                                                        @endif
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                        href="#">{{$product['name']}}</a></h4>
                                                            <span class="text-dark"><del>{{$product['unit_price']}}$</del></span>
                                                            <span class="aa-product-price">{{$product['event']['promotion_price']}}$</span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="aa-product-hvr-content">
                                                        <a href="{{ Route('detail',$product['id']) }}"
                                                           title="View"
                                                        ><span
                                                                    class="fa fa-search"></span></a>
                                                    </div>
                                                    <!-- product badge -->
                                                    <span class="aa-badge aa-hot" href="#">{{ __('HOT') }}!</span>
                                                </li>
                                        @endforeach
                                        <!-- start single product item -->
                                        </ul>
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
    <!-- / footer -->
    </body>
@endsection