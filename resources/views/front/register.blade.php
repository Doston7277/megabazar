@extends('front.layout.layout')

@section('content')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                    <li class="active">{{ __('Admin.register') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <form id="user-data" action="/user/create" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Admin.register') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ __('Admin.user_image') }}</label>
                                    <input type="file" name="user_image" id="user_image" class="form-control-file">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{ __('Admin.user_name') }}</label>
                                    <input id="user_name" class="mb-0" name="user_name" type="text" placeholder="{{ __('Admin.user_name') }}">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{ __('Admin.user_phone') }}</label>
                                    <input id="user_phone" class="mb-0" name="user_phone" type="text" placeholder="{{ __('Admin.user_phone') }}">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>{{ __('Admin.password') }}</label>
                                    <input id="user_password" name="user_password" class="mb-0" type="password" placeholder="{{ __('Admin.password') }}">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>{{ __('Admin.confirm_password') }}</label>
                                    <input id="user_password_confirmation" name="user_password_confirmation" class="mb-0" type="password" placeholder="{{ __('Admin.confirm_password') }}">
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="submit" class="register-button mt-0">{{ __('Admin.register') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageTransform
        );
        const inputElement = document.querySelector('input[id="user_image"]');
        const pond = FilePond.create(inputElement, {
            labelIdle: `<i class="fa fa-plus-circle"> {{ __('Admin.upload_image') }}</i>`,
        });
        FilePond.setOptions({
            server: {
                url: '/user/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }
        });
    </script>

    <script>

        $(document).ready(function() {
            $("#user-data").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '/user/create',
                    method: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.success) {
                            toastr['success'](data.message);
                            $('#user_image').val('');
                            $('#user_name').val('');
                            $('#user_phone').val('');
                            $('#user_password').val('');
                            $('#user_password_confirmation').val('');
                            window.location.replace('/user/'+data.user_id);
                        }
                        if (!data.success) {
                            toastr['error'](data.message);
                        }
                    }
                });
            });
        });

    </script>

@endsection
