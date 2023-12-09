@extends('layouts.admin.master')

@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">

                    @can('create-user')
                        <a href="{{ url('') }}/{{ app()->getLocale() }}/admin/user/create"
                            class="float-left btn btn-info"><i class="fas fa-angle-double-left">Create User</i></a>
                    @endcan

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ url('') }}/{{ app()->getLocale() }}/admin/home">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <h3 class="card-title">List of all users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body my__content">
                            <table id="bootstrap-table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        @can('update-user')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($userDatas as $user)
                                        <tr>

                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if ($user->role)
                                                    {{ $user->role->title }}
                                                @endif
                                            </td>
                                            <td>

                                                @if ($user->status == 1)
                                                    <span class="bg-success"> Active </span>
                                                @elseif($user->status == 0)
                                                    <span class="bg-danger"> In-Active </span>
                                                @endif

                                            </td>

                                            <td>{{ $user->remarks }}</td>

                                            @can('update-user')
                                                <td>
                                                    <ul style="list-style-type: none;">
                                                        <li><i class="fa fa-edit"></i> <a
                                                                href="{{ url('') }}/en/admin/user/edit/{{ $user->id }}">
                                                                Edit </a></li>
                                                    </ul>

                                                </td>
                                            @endcan

                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        @can('update-user')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
@endsection

@section('extraJS')
    

    <script>
        $(function() {

            $("#example_table").DataTable({

                "scrollX": true

            });

        });
    </script>

@endsection
