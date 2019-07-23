@extends('layouts.app_user')
@section('title','Tim kiem')
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
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <br>
                               <div class="beta-products-details">
                                    <center><h2 class="alert alert-success text-danger">Tim thay {{count($products)}} san pham</h2></center>
                               </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    <div class="tab-pane fade in active" id="men">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            @foreach($products as $product)
                                                <li>
                                                    <figure>

                                                        <a class="aa-product-img" href="#"><img src="data:image/jpeg;base64,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"
                                                                                                alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="#"><span
                                                                    class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                                                            <span class="aa-product-price">{{$product->unit_price}}$</span><span
                                                                    class="aa-product-price"><del>65.50$</del></span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                           title="View" data-toggle="modal"
                                                           data-target="#quick-view-modal"><span
                                                                    class="fa fa-search"></span></a>
                                                    </div>
                                                    <!-- product badge -->
                                                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                                                </li>
                                        @endforeach
                                        <!-- start single product item -->
                                        </ul>
{{--                                        {{$products->links()}}--}}
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