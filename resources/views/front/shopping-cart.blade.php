@extends('front.layout.layout')


@section('content')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.shopping_cart') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="li-product-remove">{{ __('Admin.remove') }}</th>
                                    <th class="li-product-thumbnail">{{ __('Admin.images') }}</th>
                                    <th class="cart-product-name">{{ __('Admin.product') }}</th>
                                    <th class="li-product-price">{{ __('Admin.price') }}</th>
                                    <th class="li-product-quantity">{{ __('Admin.quantity') }}</th>
                                    <th class="li-product-subtotal">{{ __('Admin.total') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                        <tr>
                                        <td class="li-product-remove"><a href="/product/deleteCart/{{ $cart->rowId }}"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="#"><img width="100px" height="100px" src="{{ asset( $cart->options->image ) }}" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#">{{ $cart->name[app()->getLocale()] }}</a></td>
                                        <td class="li-product-price"><span class="amount">{{ $cart->price }}</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{ $cart->qty }}" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">{{ $cart->subtotal }}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>{{ __('Admin.cart_total') }}</h2>
                                    <ul>
                                        <li>{{ __('Admin.total') }} {{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}<span></span></li>
                                    </ul>
                                    <a href="/order">{{ __('Admin.ordering') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
