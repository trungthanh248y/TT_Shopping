<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="{{ asset('fontawesome-free-5.9.0-web/css/all.min.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


</head>
<body>
<!-- wpf loader Two -->
<div id="wpf-loader-two">
    <div class="wpf-loader-two-inner">
        <span>{{ __('Loading') }}</span>
    </div>
</div>
<!-- / wpf loader Two -->
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->


<!-- Start header section -->
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">
                            <!-- start language -->
                            <div class="aa-language">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <img src="http://template.brillianthotel.vn/content/dam/icons/vn_ic.png"
                                             alt="english flag">VN
                                    </a>
                                </div>
                            </div>
                            <!-- / language -->

                            <!-- start currency -->
                            <!-- / currency -->
                            <!-- start cellphone -->
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span>{{ __('00-62-658-658') }}</p>
                            </div>
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                @guest
                                    <li><a href="#">{{ __('My Account') }}</a></li>
                                    <li><a href="{{Route('login')}}">{{ __('Login') }}</a></li>

                                @else

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            <!-- Text based logo -->
                            <a href="{{asset('/')}}">
                                <span class="fa fa-shopping-cart"></span>
                                <p>{{ __('daily') }}<strong>{{ __('Shop') }}</strong>
                                    <span>{{ __('Your Shopping Partner') }}</span></p>
                            </a>
                            <!-- img based logo -->
                            <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->
                        <div class="aa-cartbox">
                            <a class="aa-cart-link" href="#">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">{{ __('SHOPPING CART') }}</span>
                                <span class="aa-cart-notify">(@if(Session::has('cart')){{Session('cart')->totalQty}})
                                    <i class="fa fa-chevron-down">@else Trong) @endif</span>
                            </a>
                            @if(Session::has('cart'))
                            <div class="aa-cartbox-summary">
                                <ul>
                                    @foreach($product_cart as $product)
                                        <li>
                                            <a class="aa-cartbox-img" href="#"><img style="width: 72px; height: 72px" src="{{asset('images/'.((count($product['item']->images)>0)?($product['item']->images[0]['name']):null))}}" alt=""></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">{{$product['item']['name']}}</a></h4>
                                                <p>{{$product['qty']}} X <span>@if($product['item']->event == null)
                                                            {{number_format($product['item']['unit_price'])}}@else{{number_format($product['item']->event['promotion_price'])}}@endif
                                            (<span>{{$product['item']['id_event']}}</span>)</span></p>
                                            </div>
                                            <a class="aa-remove-product" href="{{Route('xoagiohang',$product['item']['id'])}}"><span class="fa fa-times"></span></a>
                                        </li>
                                    @endforeach
                                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                                        <span class="aa-cartbox-total-price">
                        {{number_format(Session('cart')->totalPrice)}}
                      </span>
                                    </li>
                                </ul>
                                <a class="aa-cartbox-checkout aa-primary-btn" href="{{Route('getOrder')}}">{{ __('Checkout') }}</a>
                            </div>
                            @endif
                        </div>
                        <!-- / cart box -->
                        <!-- search box -->
                        <div class="aa-search-box">
                            <form action="{{ Route('search') }}">
                                <input type="text" name="key" id="s" placeholder="Nhap tu khoa...">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{Route('welcome')}}">Home</a></li>
                            <li><a href="#">Men <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </section>

@yield('content')
<!-- / header bottom  -->
</header>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="{{ asset('js/jquery.smartmenus.js') }}"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{ asset('js/jquery.smartmenus.bootstrap.js') }}"></script>
<!-- To Slider JS -->
<script src="{{ asset('js/sequence.js') }}"></script>
<script src="{{ asset('js/sequence-theme.modern-slide-in.js') }}"></script>
<!-- Product view slider -->
<script type="text/javascript" src="{{ asset('js/jquery.simpleGallery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.simpleLens.js') }}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
<!-- Custom js -->
<script src="{{ asset('js/custom.js  ') }}"></script>
</body>
<!-- / header section -->
<!-- menu -->
