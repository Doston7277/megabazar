@extends('front.layout.layout')

@section('content')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.about_us') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- about wrapper start -->
    <div class="about-us-wrapper pt-60 pb-40">
        <div class="container">
            <div class="row">
                <!-- About Text Start -->
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="about-text-wrap">
                        <h2><span>{{ __('Admin.we_offer_the_best') }}</span>{{ __('Admin.we_will_share_the_best_for_you') }}</h2>
                        <p>{{ __('Admin.about_text') }}</p>
                        <p>{{ __('Admin.about_text2') }}</p>
{{--                        <p>We provide the beshat they trusted us and buy our product without any hagitation because they belive us and always happy to buy.</p>--}}
                    </div>
                </div>
                <!-- About Text End -->
                <!-- About Image Start -->
                <div class="col-lg-5 col-md-10">
                    <div class="about-image-wrap">
                        <img class="img-full" src="{{ asset( 'front/images/product/large-size/13.jpg' ) }}" alt="About Us" />
                    </div>
                </div>
                <!-- About Image End -->
            </div>
        </div>
    </div>
    <!-- about wrapper end -->
    <!-- Begin Counterup Area -->
    <div class="counterup-area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12">
                    <!-- Begin Limupa Counter Area -->
                    <div class="limupa-counter white-smoke-bg">
                        <div class="container">
                            <div class="counter-img">
                                <img src="{{ asset( 'front/images/about-us/icon/1.png' ) }}" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-number">
                                    <h3 class="counter">2169</h3>
                                </div>
                                <div class="counter-text">
                                    <span>{{ __('Admin.happy_customers') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- limupa Counter Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Counterup Area End Here -->
    <!-- team area wrapper start -->
    <div class="team-area pt-60 pt-sm-44">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="li-section-title capitalize mb-25">
                        <h2><span>{{ __('Admin.our_team') }}</span></h2>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                        <div class="team-thumb">
                            <img src="{{ asset( 'front/images/team/1.png' ) }}" alt="Our Team Member">
                        </div>
                        <div class="team-content text-center">
                            <h3>Tursunboyev Dostonbek</h3>
                            <p>Dasturchi</p>
                            <a href="#">+998 97 211 33 55</a>
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                        <div class="team-thumb">
                            <img src="{{ asset( 'front/images/team/2.png' ) }}" alt="Our Team Member">
                        </div>
                        <div class="team-content text-center">
                            <h3>Ro'zmetov Surojbek</h3>
                            <p>Menejer</p>
                            <a href="#">+998 33 002 00 22</a>
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
            </div>
        </div>
    </div>
    <!-- team area wrapper end -->

@endsection
