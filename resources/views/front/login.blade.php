@extends('front.layout.layout')

@section('content')


    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.login') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
                    <!-- Login Form s-->
                    <form action="/login" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Admin.login') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ __('Admin.user_name') }}<span class="text-danger">*</span></label>
                                    <input name="user_name" class="mb-0" type="text" placeholder="{{ __('Admin.user_name') }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>{{ __('Admin.password') }}<span class="text-danger">*</span></label>
                                    <input name="user_password" class="mb-0" type="password" placeholder="{{ __('Admin.password') }}">
                                </div>
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">--}}
{{--                                        <input type="checkbox" id="remember_me">--}}
{{--                                        <label for="remember_me">Remember me</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">--}}
{{--                                    <a href="#"> Forgotten pasward?</a>--}}
{{--                                </div>--}}
                                <div class="col-md-12">
                                    <button type="submit" class="register-button mt-0">{{ __('Admin.login_2') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
