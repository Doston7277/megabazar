@extends('front.layout.layout')

@section('content')

    <div class="slider-with-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="slider-area">
                        <div class="slider-active owl-carousel">
                            <div class="single-slide align-center-left  animation-style-01 bg-1">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>{{ __('Admin.sale') }} <span>-5%</span> {{ __('Admin.sale_when') }}</h5>
                                    <h2>Apple iphone 13 pro</h2>
                                    <h3>{{ __('Admin.price') }}: <span>$1150</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links bg-dark text-light" href="#">{{ __('Admin.shopping_now') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide align-center-left animation-style-02 bg-2">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>{{ __('Admin.sale') }} <span>-5%</span> {{ __('Admin.sale_when') }}</h5>
                                    <h2>Gaming HyperX</h2>
                                    <h3>{{ __('Admin.price') }}: <span>900 000 so'm</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links bg-dark text-light" href="#">{{ __('Admin.shopping_now') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide align-center-left animation-style-01 bg-3">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>{{ __('Admin.sale') }} <span>-5%</span> {{ __('Admin.sale_when') }}</h5>
                                    <h2>HiLook ip Camera</h2>
                                    <h3>{{ __('Admin.price') }}: <span>290 000 so'm</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links bg-dark text-light" href="#">{{ __('Admin.shopping_now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                    <div class="li-banner">
                        <a href="#">
                            <img src="{{ asset( 'front/images/banner/1_4.jpg' ) }}" alt="">
                        </a>
                    </div>
                    <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                        <a href="#">
                            <img src="{{ asset( 'front/images/banner/1_5.jpg' ) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-60 pb-50">
        <div class="container">
            <div class="li-section-title">
                <h2>
                    <span>{{ __('Admin.phones') }}</span>
                </h2>
{{--                <ul class="li-sub-category-list">--}}
{{--                    <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>--}}
{{--                    <li><a href="shop-left-sidebar.html">Computers</a></li>--}}
{{--                    <li><a href="shop-left-sidebar.html">Electronics</a></li>--}}
{{--                </ul>--}}
            </div>
            <div class="tab-content">
                <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($phones as $phone)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="/product/{{ $phone->product_id }}">
                                            <img src="{{ asset( $phone->product_images ) }}" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="#">{{ __('Admin.product_rate') }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="/product/{{ $phone->product_id }}">{{ $phone->product_name[app()->getLocale()] }}</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">{{ $phone->product_price }}  {{ __('Admin.pul') }}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active">
                                                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                                                    <a onclick="addProduct({{ $phone->product_id }})">{{ __('Admin.add_cart') }}</a>
                                                </li>
                                                <li><a class="links-details" href="/product/addList/{{ $phone->product_id }}"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a onclick="view({{ $phone->product_id }})" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="li-static-banner">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
                <!-- Begin Single Banner Area -->
    <!--            <div class="col-lg-4 col-md-4 text-center">-->
    <!--                <div class="single-banner">-->
    <!--                    <a href="#">-->
    <!--                        <img src="{{ asset( 'front/images/banner/1_3.jpg' ) }}" alt="Li's Static Banner">-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
    <!--            <div class="col-lg-4 col-md-4 text-center pt-xs-30">-->
    <!--                <div class="single-banner">-->
    <!--                    <a href="#">-->
    <!--                        <img src="{{ asset( 'front/images/banner/1_4.jpg' ) }}" alt="Li's Static Banner">-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
    <!--            <div class="col-lg-4 col-md-4 text-center pt-xs-30">-->
    <!--                <div class="single-banner">-->
    <!--                    <a href="#">-->
    <!--                        <img src="{{ asset( 'front/images/banner/1_5.jpg' ) }}" alt="Li's Static Banner">-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
                <!-- Single Banner Area End Here -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <section class="product-area li-laptop-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>{{ __('Admin.computers') }}</span>
                        </h2>
{{--                        <ul class="li-sub-category-list">--}}
{{--                            <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Computers</a></li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Electronics</a></li>--}}
{{--                        </ul>--}}
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($laptops as $laptop)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="/product/{{ $laptop->product_id }}">
                                            <img src="{{ asset( $laptop->product_images ) }}" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="#">{{ __('Admin.product_rate') }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="/product/{{ $laptop->product_id }}">{{ $laptop->product_name[app()->getLocale()] }}</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">{{ $laptop->product_price }} {{ __('Admin.pul') }}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a onclick="addProduct({{ $laptop->product_id }})">{{ __('Admin.add_cart') }}</a></li>
                                                <li><a class="links-details" href="/product/addList/{{ $laptop->product_id }}"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a onclick="view({{ $laptop->product_id }})" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- single-product-wrap end -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="li-static-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Li's Static Home Image Area -->
                    <div class="li-static-home-image"></div>
                    <!-- Li's Static Home Image Area End Here -->
                    <!-- Begin Li's Static Home Content Area -->
                    <div class="li-static-home-content">
                        <p>{{ __('Admin.sale') }} <span>-5%</span> {{ __('Admin.sale_when') }}</p>
                        <h2>Buyurtma bering</h2>
                        <h2>Chegirmaga ega bo'ling</h2>
                        <p class="schedule">
                            Bizda hammasi sifatli
                        </p>
                        <div class="default-btn">
                            <a href="shop-left-sidebar.html" class="links bg-dark text-light">{{ __('Admin.shopping_now') }}</a>
                        </div>
                    </div>
                    <!-- Li's Static Home Content Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <section class="product-area li-trending-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Tab Menu Area -->
                <div class="col-lg-12">

                    <div class="li-section-title">
                        <h2>
                            <span>{{ __('Admin.trend_product') }}</span>
                        </h2>
                    </div>
                    <div class="tab-content li-tab-content li-trending-product-content">
                        <div id="home1" class="tab-pane show fade in active">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($trends as $trend)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="/product/{{ $trend->product_id }}">
                                                    <img src="{{ asset( $trend->product_images ) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">{{ __('Admin.product_rate') }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="/product/{{ $trend->product_id }}">{{ $trend->product_name[app()->getLocale()] }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ $trend->product_price }} {{ __('Admin.pul') }}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a onclick="addProduct({{ $trend->product_id }})">{{ __('Admin.add_cart') }}</a></li>
                                                        <li><a class="links-details" href="/product/addList/{{ $trend->product_id }}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a onclick="view({{ $trend->product_id }})" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script>
        function addProduct(product_id) {
            $.ajax({
                url: '/product/addCart',
                type: 'POST',
                data: {
                    _token: $('#token').val(),
                    product_id: product_id,
                    quantity: 1
                },
                success: function (data) {
                    if (data.success) {
                        toastr['success'](data.message);
                        window.location.reload()
                    }
                    if (!data.success) {
                        toastr['error'](data.message);
                    }
                }
            });
        }
    </script>

@endsection
