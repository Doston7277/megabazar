@extends('front.layout.layout')

@section('content')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.wishlist') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Wishlist Area Strat-->
    <div class="wishlist-area pt-60 pb-60">
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
                                    <th class="li-product-add-cart">{{ __('Admin.add_cart') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $products as $product)
                                <tr>
                                    <td class="li-product-remove"><a href="/product/delList/{{ $product->__raw_id }}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img width="100px" height="100px" src="{{ asset($product->image) }}" alt=""></a></td>
                                    <td class="li-product-name"><a href="#">{{ $product->name }}</a></td>
                                    <td class="li-product-price"><span class="amount">{{ $product->price }} {{ __('Admin.pul') }}</span></td>
                                    <td class="li-product-add-cart"><a onclick="addProduct({{ $product->id }})">{{ __('Admin.add_cart') }}</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="token" value="{{ csrf_token() }}">

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
