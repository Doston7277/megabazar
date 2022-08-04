@extends('front.layout.layout')

@section('content')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.order') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <div class="card">
                            <div class="card-header">
                                {{ __('Admin.note') }}
                            </div>
                            <div class="card-body">
                                <i class="fa fa-map-marker"></i> {{ __('Admin.order_location') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="/order" method="post">
                        @csrf
                        <div class="checkbox-form">
                            <h3>{{ __('Admin.personal_information') }}</h3>
                            <div class="row">
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="country-select clearfix">--}}
{{--                                        <label>Country <span class="required">*</span></label>--}}
{{--                                        <select class="nice-select wide">--}}
{{--                                            <option data-display="Bangladesh">Bangladesh</option>--}}
{{--                                            <option value="uk">London</option>--}}
{{--                                            <option value="rou">Romania</option>--}}
{{--                                            <option value="fr">French</option>--}}
{{--                                            <option value="de">Germany</option>--}}
{{--                                            <option value="aus">Australia</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>{{ __('Admin.last_name') }} <span class="required text-danger">*</span></label>
                                        <input name="first_name" placeholder="" type="text" value="{{ $user->user_first_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>{{ __('Admin.first_name') }} <span class="required text-danger">*</span></label>
                                        <input name="last_name" placeholder="" type="text" value="{{ $user->user_last_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>{{ __('Admin.father_name') }} <span class="required text-danger">*</span></label>
                                        <input name="father_name" placeholder="" type="text" value="{{ $user->user_father_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>{{ __('Admin.address') }} <span class="required text-danger">*</span></label>
                                        <input name="address" placeholder="Street address" type="text" value="{{ $user->user_address }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <h3>
                                        <label>{{ __('Admin.address_correct') }}</label>
                                        <input name="question" id="ship-box" type="checkbox" required>
                                    </h3>
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>{{ __('Admin.order_notes') }}</label>
                                        <textarea name="text" id="checkout-mess" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-warning">{{ __('Admin.send') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>{{ __('Admin.your_order') }}</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-product-name">{{ __('Admin.product') }}</th>
                                    <th class="cart-product-total">{{ __('Admin.total') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                    <tr class="cart_item">
                                            <td class="cart-product-name"> {{ $cart->name[app()->getLocale()] }}<strong class="product-quantity"> × {{ $cart->qty }}</strong></td>
                                            <td class="cart-product-total"><span class="amount">{{ $cart->subtotal }}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="order-total">
                                    <th>{{ __('Admin.order_total') }}</th>
                                    <td><strong><span class="amount"> {{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
