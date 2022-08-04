@extends('admin.layout.layout')

@section('content')

    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create Subject</h4>
                            <div class="basic-form mt-4">
                                <form id="subject-data" class="form-valide">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="subject_name_uz">Subject Name Uz <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject_name_uz" name="subject_name[uz]" placeholder="Enter a Subject Name...">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="subject_name_ru">Subject Name Ru <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject_name_ru" name="subject_name[ru]" placeholder="Enter a Subject Name...">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="subject_name_en">Subject Name En <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject_name_en" name="subject_name[en]" placeholder="Enter a Subject Name...">
                                        </div>
                                    </div>
                                    <button type="button" id="submit" class="btn mb-1 btn-outline-success">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset( 'admin/plugins/jquery/jquery.min.js' ) }}"></script>

    <script>
        $(document).ready(function(){
            $("#submit").click(function() {
                var formData = $("#subject-data").serialize();
                $.ajax({
                    url: '/admin/subject/create',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if (data.success) {
                            toastr['success'](data.message);
                            $('#subject_name_uz').val('');
                            $('#subject_name_ru').val('');
                            $('#subject_name_en').val('');
                            $('#subject_route').val('');
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
