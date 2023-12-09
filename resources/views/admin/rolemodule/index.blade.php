@extends('layouts.admin.master')

@section('extraCSS')

    <link rel="stylesheet" href="{{ url('') }}/UI/Admin/Panel/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

@endsection

@section('body')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @include('admin.messages.messages')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Module</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role Module</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">

                @can('create-role-module')

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Create Role Module</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{url('')}}/en/admin/role_module/store" method="POST" role="form" id="addRoleModule" name="addRoleModule" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="{{'form-group required'.$errors->first('title',' has-error')}}">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                            <div class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="float-right btn btn-primary">Proceed</button>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    
                @endcan

            </div>

            <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">

            <!-- /.col -->
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Title</th>
	                                    <th>Date Time</th>
	                                    <th>Action</th>
	                                </tr>
                                </thead>

                                <tbody>

	                                @foreach($all_role_modules as $key=>$role_modules)
	                                    <tr>
	                                        <td>{{$key+1}}</td>

	                                        <td id="tbl-data-rolemodule-{{ $role_modules->id }}">{{$role_modules->title}}</td>

	                                        <td>{{$role_modules->created_at}}</td>

	                                        <td>

	                                            <a href="{{ url('') }}/en/admin/role_module/edit/{{$role_modules->id}}"><i class="fas fa-edit"></i></a>
                                                
	                                            | 

                                                <a href="javascript:void(0)" class="btn btn-xs btn-danger"
                                                            type="button" role="button"
                                                            onclick="deleteData({{ $role_modules->id }})"> Delete</a>

                                                <input type="hidden" name="_token" id="csrf_token"
                                                    value="{{ csrf_token() }}">

	                                        </td>
	                                    </tr>
	                                @endforeach

                                </tbody>

                                <tfoot>
	                                <tr>
                                        <th>#</th>
	                                    <th>Title</th>
	                                    <th>Date Time</th>
	                                    <th>Action</th>
	                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="roleDeleteModal" role="dialog" aria-labelledby="modalData" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="modalData"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-danger">
                    Once you delete, it cannot be undone.
                </div>

                <div class="modal-footer" id="formAction">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraJS')

    
    <script src="{{ url('') }}/UI/Admin/Panel/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ url('') }}/UI/Admin/Panel/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
        });

        function deleteData(tbleId) {

            var CSRF_TOKEN = document.getElementById("csrf_token").value;

            var title = $("#tbl-data-rolemodule-" + tbleId).html();

            $('#roleDeleteModal').modal('show');

            $("#formAction").empty();

            $('#modalData').text('You are about to delete the data ' + title);

            $("#formAction").append(
                "<form>\n" +
                "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>\n" +
                "</form>\n" +
                "<form method=\"POST\"  action=\"{{ url('') }}/en/admin/role_module/delete/" +
                tbleId +
                "\">\n" +
                "<input type=\"hidden\" name=\"_token\" value='" + CSRF_TOKEN + "'>\n" +
                "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">" +
                "<button type=\"submit\" class=\"btn btn-danger\">Confirm</button>\n" +
                "</form>"
            );
        }
    </script>

@endsection

