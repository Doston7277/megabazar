@extends('admin.layout.layout')

@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.subject') }}">Users</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Subject Table</h4>
                            <div class="table-responsive">
                                <table id="dataSubject" class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Route</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Route</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>

                                <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Subject update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="subject-form">
                                                    @csrf
                                                    <div class="form-row">
                                                        <input type="hidden" name="subject_id" id="subject_id">
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
                                                        <div class="form-group col-md-6">
                                                            <label for="subject_route">Subject Name En <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="subject_route" name="subject_route" placeholder="Enter a Subject Route...">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="close" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                <button type="button" id="submit" class="btn btn-outline-success" data-dismiss="modal">Save changes</button>
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
@endsection

@section('js')
    <script src="{{ asset( 'admin/plugins/jquery/jquery.min.js' ) }}"></script>

    <script>
        $(document).ready(function(){
            table = $('#dataSubject').DataTable({
                // language: {
                //     url: '//cdn.datatables.net/plug-ins/1.11.2/i18n/uz.json'
                // },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/subject/datatable",
                    type: "POST",
                    data: {
                        "_token": "{{csrf_token()}}"
                    }
                },
                columns: [
                    {data: 'id', name: 'subject_id'},
                    {data: 'name', name: 'subject_name'},
                    {data: 'route', name: 'subject_route'},
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $("#submit").click(function() {
                var formData = $("#subject-form").serialize();
                $.ajax({
                    url: '{{ route('admin.subject-update') }}',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if (data.success) {
                            toastr['success'](data.message);
                            $('#subject_name_uz').val('');
                            $('#subject_name_ru').val('');
                            $('#subject_name_en').val('');
                            $('#subject_route').val('');
                            table.ajax.reload();
                        }
                        if (!data.success) {
                            toastr['error'](data.message);
                        }
                    }
                });
            });
        });

        function deleted(subject_id) {
            $(document).ready(function(){
                $.ajax({
                    url: '/admin/subject/delete/'+subject_id,
                    type: 'GET',
                    success: function (data) {
                        if (data.success) {
                            toastr['success'](data.message);
                            table.ajax.reload();
                        }
                        if (!data.success) {
                            toastr['error'](data.message);
                        }
                    }
                });
            });
        }

        function updated(subject_id) {
            $.get( '/admin/subject/update/'+subject_id, function( data ) {
                $('#subject_name_uz').val(data.subject_name['uz']);
                $('#subject_name_ru').val(data.subject_name['ru']);
                $('#subject_name_en').val(data.subject_name['en']);
                $('#subject_route').val(data.subject_route);
                $('#subject_id').val(data.subject_id);
            });
        }
    </script>

@endsection
