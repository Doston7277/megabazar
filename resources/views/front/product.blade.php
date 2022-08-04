@extends("front.layout.layout")

@section("content")
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route("home") }}">{{ __("Admin.home") }}</a></li>
                    <li class="active">{{ __("Admin.product") }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-wraper pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container mt-3 mb-2">
                        <center>
                            <button class="category-button btn btn-outline-secondary" data-filter="all">{{ __("Admin.all") }}</button>

                            @foreach($categories as $category)
                                <button class="category-button btn btn-outline-secondary" data-filter="{{ $category->category_id }}">{{ $category->category_name[app()->getLocale()] }}</button>
                            @endforeach
                        </center>
                    </div>
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="filter {{ $product->category_id }}  col-lg-4 col-md-4 col-sm-6 mt-40">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="/product/{{ $product->product_id }}">
                                                        <img src="{{ asset($product->product_images) }}" alt="Li's Product Image">
                                                    </a>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a>{{ $product->product_name[app()->getLocale()] }}</a>
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
                                                        <h4><a class="product_name" href="/product/{{ $product->product_id }}">{{ $product->product_model }}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ $product->product_price }}</span> {{ __('Admin.pul') }}
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a onclick="addProduct({{ $product->product_id }})">{{ __('Admin.add_cart') }}</a></li>
                                                            <li><a class="links-details" href="/product/addList/{{ $product->product_id }}"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a onclick="view({{ $product->product_id }})" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>{{ __("Admin.showing") }} {{ $products->currentPage() }} - {{ $products->perPage() }} {{ __("Admin.of") }} {{ $products->total() }} {{ __("Admin.item") }}</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li>
                                                <a href="{{ $products->appends(request()->input())->previousPageUrl()}}" class="Previous"><i class="fa fa-chevron-left"></i> {{ __("Admin.previous") }} </a>
                                            </li>
                                            <li><a href="#" class="active">{{ $products->appends(request()->input())->currentPage() }}</a></li>
                                            <li>
                                                <a href="{{ $products->appends(request()->input())->nextPageUrl() }}" class="Next"> {{ __("Admin.next") }} <i class="fa fa-chevron-right"></i></a>
                                            </li>
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
@endsection

@section("js")

    <script>
        (function ( $ ) {
            $.fn.categoryFilter=function(selector){
                this.click( function() {
                    var categoryValue = $(this).attr("data-filter");
                    $(this).addClass("active").siblings().removeClass("active");
                    if(categoryValue==="all") {
                        $(".filter").show(1000);
                    } else {
                        $('.filter').not("."+categoryValue).hide("3000");
                        $(".filter").filter("."+categoryValue).show("3000");
                    }
                });
            }
        }( jQuery ));

        $(".category-button").categoryFilter();
    </script>

@endsection
