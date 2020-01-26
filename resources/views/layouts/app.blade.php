<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
    <!-- Styles -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Style CSS -->

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('style')
</head>
<body>
<!-- ##### Header Area Start ##### -->
<div class="wrapper"  id="app">
<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="#">Shop</a>
                            <div class="megamenu">
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Women's Collection</li>
                                    <li><a href="shop.html">Dresses</a></li>
                                    <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                    <li><a href="shop.html">T-shirts</a></li>
                                    <li><a href="shop.html">Rompers</a></li>
                                    <li><a href="shop.html">Bras &amp; Panties</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Men's Collection</li>
                                    <li><a href="shop.html">T-Shirts</a></li>
                                    <li><a href="shop.html">Polo</a></li>
                                    <li><a href="shop.html">Shirts</a></li>
                                    <li><a href="shop.html">Jackets</a></li>
                                    <li><a href="shop.html">Trench</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Kid's Collection</li>
                                    <li><a href="shop.html">Dresses</a></li>
                                    <li><a href="shop.html">Shirts</a></li>
                                    <li><a href="shop.html">T-shirts</a></li>
                                    <li><a href="shop.html">Jackets</a></li>
                                    <li><a href="shop.html">Trench</a></li>
                                </ul>
                                <div class="single-mega cn-col-4">
                                    <img src="img/bg-img/bg-6.jpg" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="single-product-details.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="regular-page.html">Regular Page</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="#" method="post">
                    <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area">
                <a href="#"><i class="far fa-heart"></i></a>
            </div>
            <!-- User Login Info -->
            <div class="user-login-info">
                <a href="#"><i class="far fa-user"></i></a>
            </div>
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><i class="fas fa-shopping-bag"></i> <span>3</span></a>
            </div>
        </div>

    </div>
</header>
<!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <cart></cart>
@yield('content')

<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                    </div>
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <ul>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area mb-30">
                    <ul class="footer_widget_menu">
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Shipping and Delivery</a></li>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row align-items-end">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_heading mb-30">
                        <h6>Subscribe</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="#" method="post">
                            <input type="email" name="mail" class="mail" placeholder="Your email here">
                            <button type="submit" class="submit"><i class="fa fa-long-arrow-right"
                                                                    aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"
                                                                                                  aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="row mt-5">--}}
            {{--<div class="col-md-12 text-center">--}}
                {{--<p>--}}
                    {{--<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
                    {{--Copyright &copy;<script>document.write(new Date().getFullYear());</script>--}}
                    {{--All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by--}}
                    {{--<a href="https://colorlib.com" target="_blank">Colorlib</a>--}}
                    {{--<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
                {{--</p>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
</footer>
<!-- ##### Footer Area End ##### -->

</div>
<script src="{{asset("js/app.js")}}"></script>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset("js/jquery/jquery-2.2.4.min.js")}}"></script>
<!-- Popper js -->
<script src="{{asset("js/popper.min.js")}}"></script>
<!-- Bootstrap js -->
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<!-- Plugins js -->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- Classy Nav js -->
<script src="{{asset('js/classy-nav.min.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>
@yield('js')

</body>
</html>
