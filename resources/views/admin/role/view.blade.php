@extends('layouts.admin.master')

@section('body')
    <section class="content-header">
        <div class="container-fluid">
            @include('admin.messages.messages')
            <div class="row mb-2">
                <div class="col-sm-6">

                    @can('create-role')
                        <a href="{{ route('role.create', ['locale' => app()->getLocale()]) }}" role="button" type="button"
                            class="btn btn-info btn-sm"> Create User Role </a>
                    @endcan

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ url('') }}/{{ app()->getLocale() }}/admin/home">Home</a></li>
                        <li class="breadcrumb-item active">User Role</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of all roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Permissions</th>
                                    @can(['delete-role', 'update-role'])
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (\App\Models\Role::all() as $role)
                                    <tr>

                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->title }}</td>

                                        <td>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Module</th>
                                                        <th>Permission</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (json_decode($role->permissions) as $key)
                                                        <tr>
                                                            <td>{{ $key->model }}</td>
                                                            <td>
                                                                @if ($key->permission >= 1 and $key->permission < 2)
                                                                    View
                                                                @elseif($key->permission >= 2 and $key->permission < 3)
                                                                    View, Create
                                                                @elseif($key->permission >= 3 and $key->permission < 4)
                                                                    View, Create, Update
                                                                @elseif($key->permission == 4)
                                                                    View, Create, Update, Delete
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </td>

                                        @can(['delete-role', 'update-role'])
                                            <td>
                                                <a href="{{ url('') }}/en/admin/role/edit/{{ $role->id }}"><i
                                                        class="fas fa-edit"></i></a>
                                                |
                                                <a href="javascript:void(0)"><i class="far fa-trash-alt" style="color:red;"
                                                        onclick="deleteRole('<?= $role->id ?>')"></i></a>

                                                <input type="hidden" name="_token" id="csrf_token"
                                                    value="{{ csrf_token() }}">

                                            </td>
                                        @endcan

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Permissions</th>
                                    @can(['delete-role', 'update-role'])
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
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
    <script>
        function deleteRole($roleId) {

            var roleId = $roleId;

            var CSRF_TOKEN = document.getElementById("csrf_token").value;

            $('#roleDeleteModal').modal('show');

            $.ajax({

                type: "get",

                url: "{{ url('') }}/en/admin/deleted/role/" + roleId,

                success: function(response) {

                    $("#formAction").empty();

                    $('#modalData').text('You are about to delete the role ' + response.title);

                    $("#formAction").append(
                        "<form>\n" +
                        "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>\n" +
                        "</form>\n" +
                        "<form method=\"POST\"  action=\"{{ url('') }}/en/admin/role/delete/" +
                        roleId + "\">\n" +
                        "<input type=\"hidden\" name=\"_token\" value='" + CSRF_TOKEN + "'>\n" +
                        "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">" +
                        "<button type=\"submit\" class=\"btn btn-danger\">Confirm</button>\n" +
                        "</form>"
                    );
                }
            });
        }
    </script>
@endsection
