@extends('front.layout.layout')

@section('content')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.contact') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Contact Main Page Area -->
    <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
        <div class="container mb-60">
            <div id="googleMap" style="width:100%;height:400px;"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">{{ __('Admin.contact_us') }}</h3>
                        <p class="contact-page-message mb-25">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> {{ __('Admin.address') }}</h4>
                            <p>Khorezm Gurlen P.Makhmud 77</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> {{ __('Admin.phone') }}</h4>
                            <p>Mobile: (+998) 99 123 45 78</p>
                            <p>Hotline: 1009 678 456</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> {{ __('Admin.email') }}</h4>
                            <p>info@megatech.com</p>
                            <p>support@megatech.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <div class="contact-form-content pt-sm-55 pt-xs-55">
                        <h3 class="contact-page-title">{{ __('Admin.tell_your_message') }}</h3>
                        <div class="contact-form">
                            <form action="{{ route('create-contact') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('Admin.your_name') }} <span class="required">*</span></label>
                                    <input type="text" name="user_name" id="customername" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Admin.your_phone') }} <span class="required">*</span></label>
                                    <input type="tel" name="user_phone" id="customerPhone" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Admin.subject') }}</label>
                                    <input type="text" name="contact_subject" id="contactSubject">
                                </div>
                                <div class="form-group mb-30">
                                    <label>{{ __('Admin.your_message') }}</label>
                                    <textarea name="contact_message" id="contactMessage" ></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">{{ __('Admin.send') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Main Page Area End Here -->

@endsection

@section('js')
    <script>
        function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(41.844557507371334, 60.39115103097242),
                zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgE1_e1NJp_2fsTY4atr-Gf4QMh1q6LZY&callback=myMap"></script>
@endsection
