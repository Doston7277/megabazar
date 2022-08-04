@extends('front.layout.layout')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">Mahsulot haqida</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">
                                <img src="{{ asset( $product->product_images) }}" alt="product image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content sp-normal-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product->product_name[app()->getLocale()] }}</h2>
                            <span class="product-details-ref">{{ $product->product_model }}</span>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <!--<li class="review-item"><a href="#">Read Review</a></li>-->
                                    <!--<li class="review-item"><a href="#">Write Review</a></li>-->
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                                <span class="new-price new-price-2">{{ $product->product_price }} {{ __('Admin.pul') }}</span>
                            </div>
                            
                            <div class="single-add-to-cart">
                                <form id="dataProduct" action="/product/addCart" method="POST" class="cart-quantity">
                                    @csrf
                                    <div class="quantity">
                                        <label>{{ __('Admin.quantity') }}</label>
                                        <div class="cart-plus-minus">
                                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                            <input class="cart-plus-minus-box" value="1" type="text" name="quantity">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="button" id="addProduct">{{ __('Admin.add_cart') }}</button>
                                </form>
                            </div>
                            <div class="product-additional-info">
                                <div class="product-social-sharing">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="product-area pt-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                        <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                        <!--<li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span>{{ $product->product_description[app()->getLocale()] }}</span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    <table class="table">
                        <tbody>
                            @foreach($product->product_nature as $data)
                            <tr>
                                <td>{{ $data['title'][app()->getLocale()] }}</td>
                                <td>{{ $data['value'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review">
                            <span>Grade</span>
                            <ul class="rating">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="comment-author-infos pt-25">
                            <span>HTML 5</span>
                            <em>01-12-18</em>
                        </div>
                        <div class="comment-details">
                            <h4 class="title-block">Demo</h4>
                            <p>Plaza</p>
                        </div>
                        <div class="review-btn">
                            <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                        </div>
                        <div class="modal fade modal-wrapper" id="mymodal" >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="review-page-title">Write Your Review</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-6">
                                                <div class="li-review-product">
                                                    <img src="images/product/large-size/3.jpg" alt="Li's Product">
                                                    <div class="li-review-product-desc">
                                                        <p class="li-product-name">Today is a good day Framed poster</p>
                                                        <p>
                                                            <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="li-review-content">
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <h3 class="feedback-title">Our Feedback</h3>
                                                            <form action="#">
                                                                <p class="your-opinion">
                                                                    <label>Your Rating</label>
                                                                    <span>
                                                                        <select class="star-rating">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </span>
                                                                </p>
                                                                <p class="feedback-form">
                                                                    <label for="feedback">Your Review</label>
                                                                    <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">Name<span class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author feedback-form-email">
                                                                        <label for="email">Email<span class="required">*</span>
                                                                        </label>
                                                                        <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                        <span class="required"><sub>*</sub> Required fields</span>
                                                                    </p>
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                        <a href="#">Submit</a>
                                                                    </div>
                                                                </div>
                                                            </form>
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
            </div>
        </div>
    </div>
</div>

<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Tavsiya qilamiz</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                       @foreach($products as $data) 
                        <div class="col-lg-12">
                            
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/product/{{ $data->product_id }}">
                                        <img src="{{ asset($data->product_images) }}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="/product/{{ $data->product_id }}">Mahsulot reytingi</a>
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
                                        <h4><a class="product_name" href="/product/{{ $data->product_id }}">{{ $data->product_name[app()->getLocale()] }}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{ $data->product_price }} so'm</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a onclick="addProduct({{ $data->product_id }})">Add to cart</a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
</section>

@endsection
@section('js')

    <script>
        $('#addProduct').click(function () {
            $.ajax({
                url: '/product/addCart',
                type: 'POST',
                data: $('#dataProduct').serialize(),
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
        })
    </script>

@endsection
