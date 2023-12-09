@extends('layouts.admin.master')

    @section('body')

        <section class="content-header">
            <div class="container-fluid">

                @include('admin.messages.messages')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        @can('view-role')<a href="{{url('')}}/{{app()->getLocale()}}/admin/role" class="float-left btn btn-info"><i class="fas fa-angle-double-left"> Back to User Role</i></a>@endcan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/{{app()->getLocale()}}/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">User Role</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-6 offset-3">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Role Create Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div ng-controller="RoleController" layout="column" ng-cloak>

                                <md-content layout-padding>
                                    <form name="roleForm" method="POST" action="{{ url('') }}/en/admin/role/store">

                                        {{ csrf_field() }}

                                        @include("admin.role.form")

                                        <div>
                                            <md-button  class="md-raised md-primary"  type="submit">Proceed</md-button>
                                        </div>
                                    </form>
                                </md-content>

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
