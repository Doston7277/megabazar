@extends('front.layout.layout')

@section('content')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.account') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="text-center p-3 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <h1>{{ __('Admin.my_account') }}</h1>
                </div>
                <div class="p-3 col-sm-4 col-md-4 col-lg-4 col-xs-4">
                    @if($user->user_image != '0')
                        <img width="100%" src="{{ asset($user->user_image) }}" alt="">
                    @else
                        <img width="100%" src="{{ asset('images/user_icon.jpg') }}" alt="">
                    @endif
                </div>
                <div class="p-5 col-sm-6 col-md-6 col-lg-6 col-xs-6">
                    <div>
                        <p class="d-inline">{{ __('Admin.user_name') }}: </p>
                        <h6 class="d-inline">{{ $user->user_name }}</h6>
                    </div>
                    <div>
                        <p class="d-inline">{{ __('Admin.user_phone') }}: </p>
                        <h6 class="d-inline">{{ $user->user_phone }}</h6>
                    </div>
                    <div>
                        <p class="d-inline">{{ __('Admin.first_name') }}: </p>
                        <h6 class="d-inline">{{ $user->user_first_name }}</h6>
                    </div>
                    <div>
                        <p class="d-inline">{{ __('Admin.last_name') }}: </p>
                        <h6 class="d-inline">{{ $user->user_last_name }}</h6>
                    </div>
                    <div>
                        <p class="d-inline">{{ __('Admin.father_name') }}: </p>
                        <h6 class="d-inline">{{ $user->user_father_name }}</h6>
                    </div>
                    <div>
                        <p class="d-inline">{{ __('Admin.address') }}: </p>
                        <h6 class="d-inline">{{ $user->user_address }}</h6>
                    </div>
                </div>
                <div class="text-center p-3 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <h1 class="text-center">{{ __('Admin.your_order') }}</h1>
                </div>
                <div class="p-3 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('Admin.product_name') }}</th>
                            <th scope="col">{{ __('Admin.product_model') }}</th>
                            <th scope="col">{{ __('Admin.product_price') }}</th>
                            <th scope="col">{{ __('Admin.product_company') }}</th>
                            <th scope="col">{{ __('Admin.order_status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $item)
                            <tr>
                                <th scope="row">{{ $item->order_id }}</th>
                                <td>
                                    @foreach($item->products as $product)
                                        <h6>{{ $product['name'][app()->getLocale()] }}</h6>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->products as $product)
                                        <h6>{{ $product['model'] }}</h6>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->products as $product)
                                        <h6>{{ $product['price'] }}</h6>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->products as $product)
                                        <h6>{{ $product['company'] }}</h6>
                                    @endforeach
                                </td>
                                <td>
                                    @if(!$item->order_status)
                                        <i class="far fa-check-circle"></i> Qabul qilingan
                                    @else
                                        <i class="fa fa-spinner"></i> Ko'rib chiqilmoqda
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->


@endsection
