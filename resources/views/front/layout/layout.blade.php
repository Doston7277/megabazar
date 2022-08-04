<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MEGATECH</title>
    <meta name="keywords" content="internet magazin, gurlan, telefon, uzbekiston, megatech, megasoft, megabazar, mega-bazar" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MegaSoft"/>
    <link rel="canonical" href="http://mega-bazar.uz/">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset( 'front/m2.png' ) }}">

    <link rel="stylesheet" href="{{ asset( 'front/css/material-design-iconic-font.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'front/css/font-awesome.min.css' ) }}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ asset( 'front/css/fontawesome-stars.css' ) }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/meanmenu.css' ) }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/owl.carousel.min.css' ) }}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/slick.css' ) }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/animate.css' ) }}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/jquery-ui.min.css' ) }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/venobox.css' ) }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/nice-select.css' ) }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/magnific-popup.css' ) }}">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/bootstrap.min.css' ) }}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/helper.css' ) }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/style.css' ) }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset( 'front/css/responsive.css' ) }}">
    <!-- Modernizr js -->
    <script src="{{ asset( 'front/js/vendor/modernizr-2.8.3.min.js' ) }}"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="body-wrapper">
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="header-top-left">
                            <ul class="phone-wrap">
                                <li><span>{{ __('Admin.phone') }}: </span><a href="#"> (+998) 33 060 00 06</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="header-top-right">
                            <ul class="ht-menu">
                                <li>
                                    <div class="ht-setting-trigger"><span>{{ __('Admin.setting') }}</span></div>
                                    <div class="setting ht-setting">
                                        <ul class="ht-setting-list">
                                            @if(\Illuminate\Support\Facades\Auth::user() != null)
                                                <li><a href="/user/{{ \Illuminate\Support\Facades\Auth::user()->user_id }}">{{ \Illuminate\Support\Facades\Auth::user()->user_name }}</a></li>
                                                <li><a href="{{ route('logout') }}">{{ __('Admin.logout') }}</a></li>
                                            @else
                                                <li><a href="{{ route('login') }}">{{ __('Admin.sign_in') }}</a></li>
                                            @endif
                                            <li><a href="{{ route('register') }}">{{ __('Admin.register') }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <span class="language-selector-wrapper">{{ __('Admin.language') }} :</span>
                                    <div class="ht-language-trigger"><span>{{ app()->getLocale() }}</span></div>
                                    <div class="language ht-language">
                                        <ul class="ht-setting-list">
                                            <li><a href="/lang/uz">Uz</a></li>
                                            <li><a href="/lang/ru">Ru</a></li>
                                            <li><a href="/lang/en">En</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10 pl-0 ml-sm-15 ml-xs-15">
                        <form action="/product/search" method="post" class="hm-searchbox">
                            @csrf
                            <input name="search" type="text" placeholder="{{ __('Admin.search') }}">
                            <button class="li-btn bg-dark" type="submit"><i class="text-light fa fa-search"></i></button>
                        </form>
                        <div class="header-middle-right">
                            <ul class="hm-menu">
                                <li class="hm-wishlist">
                                    <a href="{{ route('wishlist') }}">
                                        <span class="cart-item-count wishlist-item-count text-light bg-dark">{{ Overtrue\LaravelShoppingCart\Facade::all()->count() }}</span>
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </li>
                                <li class="hm-minicart">
                                    <div class="hm-minicart-trigger text-light bg-dark">
                                        <span class="item-icon"></span>
                                        <span class="item-text">
                                            {{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}
                                            <span class="cart-item-count text-light bg-dark">
                                                {{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="minicart">
                                        <ul class="minicart-product-list">
                                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                                <li>
                                                    <a href="single-product.html" class="minicart-product-image">
                                                        <img src="{{ asset( $cart->options->image ) }}" alt="cart products">
                                                    </a>
                                                    <div class="minicart-product-details">
                                                        <h6><a href="single-product.html">{{ $cart->name[app()->getLocale()] }}</a></h6>
                                                        <span>{{ $cart->price }} x {{ $cart->qty }}</span>
                                                    </div>
                                                    <a href="/product/deleteCart/{{ $cart->rowId }}">
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <p class="minicart-total">{{ __('Admin.subtotal') }}: <span>
                                                {{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}
                                            </span></p>
                                        <div class="minicart-button">
                                            <a href="{{ route('shopping-cart') }}" class="li-button li-button-fullwidth li-button-dark">
                                                <span>{{ __('Admin.view_cart') }}</span>
                                            </a>
{{--                                            <a href="checkout.html" class="li-button li-button-fullwidth">--}}
{{--                                                <span>Checkout</span>--}}
{{--                                            </a>--}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 bg-dark" id="navbar_top">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <a class="navbar-brand text-light" href="#"><img src="{{ asset('front/megatech-logo.png') }}" width="150px" height="50px" alt=""></a>
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto " id="subject">

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>

    @yield('content')

    <div class="footer">
        <div class="footer-static-top">
            <div class="container">
                <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                            <div class="li-shipping-inner-box">
                                <div class="shipping-icon">
                                    <img src="{{ asset( 'front/images/shipping-icon/1.png' ) }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-text">
                                    <h2>{{ __('Admin.fast_delivery') }}</h2>
                                    <p>{{ __('Admin.fast_delivery_des') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                            <div class="li-shipping-inner-box">
                                <div class="shipping-icon">
                                    <img src="{{ asset( 'front/images/shipping-icon/2.png' ) }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-text">
                                    <h2>{{ __('Admin.safe_payment') }}</h2>
                                    <p>{{ __('Admin.safe_payment_dec') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                            <div class="li-shipping-inner-box">
                                <div class="shipping-icon">
                                    <img src="{{ asset( 'front/images/shipping-icon/3.png' ) }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-text">
                                    <h2>{{ __('Admin.shop_with_confidence') }}</h2>
                                    <p>{{ __('Admin.shop_with_confidence_dec') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                            <div class="li-shipping-inner-box">
                                <div class="shipping-icon">
                                    <img src="{{ asset( 'front/images/shipping-icon/4.png' ) }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-text">
                                    <h2>{{ __('Admin.help_center') }}</h2>
                                    <p>{{ __('Admin.help_center_dec') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-static-middle">
            <div class="container">
                <div class="footer-logo-wrap pt-50 pb-35">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-logo">
                                <img src="{{ asset( 'front/megatech-logo-dark.png' ) }}" width="70%" height="50%" alt="Footer Logo">
                            </div>
                            <ul class="des">
                                <li>
                                    <span>{{ __('Admin.address') }}: </span>
                                    Gurlan P.Mahmud MegaTech
                                </li>
                                <li>
                                    <span>{{ __('Admin.phone') }}: </span>
                                    <a href="#">+998 99 123 45 67</a>
                                </li>
                                <li>
                                    <span>{{ __('Admin.email') }}: </span>
                                    <a href="mailto://info@yourdomain.com">info@mega-bazar.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <div class="footer-block">
                                <h3 class="footer-block-title">{{ __('Admin.product') }}</h3>
                                <ul>
                                    <li><a href="#">{{ __('Admin.drop_price') }}</a></li>
                                    <li><a href="#">{{ __('Admin.new_product') }}</a></li>
                                    <li><a href="#">{{ __('Admin.best_sales') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <div class="footer-block">
                                <h3 class="footer-block-title">{{ __('Admin.our_company') }}</h3>
                                <ul>
                                    <li><a href="#">{{ __('Admin.delivery') }}</a></li>
                                    <li><a href="{{ route('about') }}">{{ __('Admin.about_us') }}</a></li>
                                    <li><a href="{{ route('contact') }}">{{ __('Admin.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer-block">
                                <h3 class="footer-block-title">{{ __('Admin.follow_us') }}</h3>
                                <ul class="social-link">
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/megatech_megasoft/" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-static-bottom pt-55 pb-55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center pt-25">
                            <span>Developer:<a target="_blank" href=""> Dostonbek</a></span>
                            <span>Company:<a target="_blank" href=""> MegaSoft</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-wrapper" id="exampleModalCenter" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image" id="view-image">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2 id="view-model"></h2>
                                    <span class="product-details-ref" id="view-name"></span>
                                    <div class="rating-box pt-20">
                                        <ul class="rating rating-with-review-item">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="review-item"><a href="#">Read Review</a></li>
                                            <li class="review-item"><a href="#">Write Review</a></li>
                                        </ul>
                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2" id="view-price"></span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span id="view-description"></span>
                                        </p>
                                    </div>
                                    <div class="product-additional-info pt-25 ">
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="youtube"><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i>Youtube</a></li>
                                                <li class="instagram"><a href=https://www.instagram.com/megatech_megasoft/"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
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
</div>


<script src="{{ asset( 'front/js/vendor/jquery-1.12.4.min.js' ) }}"></script>
<!-- Popper js -->
<script src="{{ asset( 'front/js/vendor/popper.min.js' ) }}"></script>
<!-- Bootstrap V4.1.3 Fremwork js -->
<script src="{{ asset( 'front/js/bootstrap.min.js' ) }}"></script>
<!-- Ajax Mail js -->
<script src="{{ asset( 'front/js/ajax-mail.js' ) }}"></script>
<!-- Meanmenu js -->
<script src="{{ asset( 'front/js/jquery.meanmenu.min.js' ) }}"></script>
<!-- Wow.min js -->
<script src="{{ asset( 'front/js/wow.min.js' ) }}"></script>
<!-- Slick Carousel js -->
<script src="{{ asset( 'front/js/slick.min.js' ) }}"></script>
<!-- Owl Carousel-2 js -->
<script src="{{ asset( 'front/js/owl.carousel.min.js' ) }}"></script>
<!-- Magnific popup js -->
<script src="{{ asset( 'front/js/jquery.magnific-popup.min.js' ) }}"></script>
<!-- Isotope js -->
<script src="{{ asset( 'front/js/isotope.pkgd.min.js' ) }}"></script>
<!-- Imagesloaded js -->
<script src="{{ asset( 'front/js/imagesloaded.pkgd.min.js' ) }}"></script>
<!-- Mixitup js -->
<script src="{{ asset( 'front/js/jquery.mixitup.min.js' ) }}"></script>
<!-- Countdown -->
<script src="{{ asset( 'front/js/jquery.countdown.min.js' ) }}"></script>
<!-- Counterup -->
<script src="{{ asset( 'front/js/jquery.counterup.min.js' ) }}"></script>
<!-- Waypoints -->
<script src="{{ asset( 'front/js/waypoints.min.js' ) }}"></script>
<!-- Barrating -->
<script src="{{ asset( 'front/js/jquery.barrating.min.js' ) }}"></script>
<!-- Jquery-ui -->
<script src="{{ asset( 'front/js/jquery-ui.min.js' ) }}"></script>
<!-- Venobox -->
<script src="{{ asset( 'front/js/venobox.min.js' ) }}"></script>
<!-- Nice Select js -->
<script src="{{ asset( 'front/js/jquery.nice-select.min.js' ) }}"></script>
<!-- ScrollUp js -->
<script src="{{ asset( 'front/js/scrollUp.min.js' ) }}"></script>
<!-- Main/Activator js -->
<script src="{{ asset( 'front/js/main.js' ) }}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="//code-eu1.jivosite.com/widget/HseYXaGt3Y" async></script>
@yield('js')

<script>
    $.get( '/subject/select/', function( data ) {
        var options = "<li class=\"nav-item mr-5 pl-3\"><a class=\"navbar-brand text-light\" href=\"{{ route('home') }}\">{{ __('Admin.home') }}</a></li>";
        $.each( data, function( key, subject) {
            options += "<li class=\"nav-item mr-5 pl-3\"><a class=\"navbar-brand text-light\" href=\"/products/"+subject.subject_id+"\">"+subject.subject_name['{{ app()->getLocale() }}']+"</a></li>"
        });
        options += "<li class=\"nav-item mr-5 pl-3\"><a class=\"navbar-brand text-light\" href=\"{{ route('blog') }}\">{{ __('Admin.blog') }}</a></li>\n" +
            "<li class=\"nav-item mr-5 pl-3\"><a class=\"navbar-brand text-light\" href=\"{{ route('about') }}\">{{ __('Admin.about_us') }}</a></li>\n" +
            "<li class=\"nav-item mr-5 pl-3\"><a class=\"navbar-brand text-light\" href=\"{{ route('contact') }}\">{{ __('Admin.contact') }}</a></li>"
        $('#subject').html(options);
        $('#subject-mobile').html(options);
    });

    function view(product_id) {
        $.get( "/view/" + product_id, function( data ) {
            $('#view-image').html("<img src='"+data.product_images+"' alt=\"product image\">")
            $('#view-name').text(data.product_name['{{ app()->getLocale() }}'])
            $('#view-price').text(data.product_price)
            $('#view-description').text(data.product_description['{{ app()->getLocale() }}'])
            $('#view-model').text(data.product_model)
        });
    }

</script>

<script>
    @if(Session::has('message'))
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ session('error') }}");
    @endif
    document.addEventListener("DOMContentLoaded", function(){
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.getElementById('navbar_top').classList.add('fixed-top');
                // add padding top to show content behind navbar
                navbar_height = document.querySelector('.navbar').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                document.getElementById('navbar_top').classList.remove('fixed-top');
                // remove padding top from body
                document.body.style.paddingTop = '0';
            }
        });
    });
</script>


</body>
</html>
