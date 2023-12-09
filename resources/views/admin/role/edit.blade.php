@extends("layouts.admin.master")
@section('body')

    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit A Role</h1>
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
                            <h3 class="card-title">Editing the role for {{ $role->title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div ng-controller="RoleController" layout="column" ng-cloak>

                                <md-content layout-padding>
                                    <form name="roleForm" method="POST" action="{{ url('') }}/en/admin/role/update/{{ $role->id }}">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <div data-ng-init="title = '{{ $role->title }}'" ></div>
                                        @foreach(json_decode($role->permissions) as $role)

                                            @if($role->model == 'cluster')
                                                @if($role->permission == 1 )
                                                    <div data-ng-init="cluster_selected = [1]"></div>
                                                    <div data-ng-init="cluster = [1]"></div>
                                                @elseif($role->permission == 2)
                                                    <div data-ng-init="cluster_selected = [1,2]"></div>
                                                    <div data-ng-init="cluster = [2]"></div>
                                                @elseif($role->permission == 3)
                                                    <div data-ng-init="cluster_selected = [1,2,3]"></div>
                                                    <div data-ng-init="cluster = [3]"></div>
                                                @elseif($role->permission == 4)
                                                    <div data-ng-init="cluster_selected = [1,2,3,4]"></div>
                                                    <div data-ng-init="cluster = [4]"></div>
                                                @endif





                                            @elseif($role->model == 'module')
                                                @if($role->permission == 1 )
                                                    <div data-ng-init="module_selected = [1]"></div>
                                                    <div data-ng-init="module = [1]"></div>
                                                @elseif($role->permission == 2)
                                                    <div data-ng-init="module_selected = [1,2]"></div>
                                                    <div data-ng-init="module = [2]"></div>
                                                @elseif($role->permission == 3)
                                                    <div data-ng-init="module_selected = [1,2,3]"></div>
                                                    <div data-ng-init="module = [3]"></div>
                                                @elseif($role->permission == 4)
                                                    <div data-ng-init="module_selected = [1,2,3,4]"></div>
                                                    <div data-ng-init="module = [4]"></div>
                                                @endif


                                            @elseif($role->model == 'role')
                                                @if($role->permission == 1 )
                                                    <div data-ng-init="role_selected = [1]"></div>
                                                    <div data-ng-init="role = [1]"></div>
                                                @elseif($role->permission == 2)
                                                    <div data-ng-init="role_selected = [1,2]"></div>
                                                    <div data-ng-init="role = [2]"></div>
                                                @elseif($role->permission == 3)
                                                    <div data-ng-init="role_selected = [1,2,3]"></div>
                                                    <div data-ng-init="role = [3]"></div>
                                                @elseif($role->permission == 4)
                                                    <div data-ng-init="role_selected = [1,2,3,4]"></div>
                                                    <div data-ng-init="role = [4]"></div>
                                                @endif


                                            @elseif($role->model == 'user')
                                                @if($role->permission == 1 )
                                                    <div data-ng-init="user_selected = [1]"></div>
                                                    <div data-ng-init="user = [1]"></div>
                                                @elseif($role->permission == 2)
                                                    <div data-ng-init="user_selected = [1,2]"></div>
                                                    <div data-ng-init="user = [2]"></div>
                                                @elseif($role->permission == 3)
                                                    <div data-ng-init="user_selected = [1,2,3]"></div>
                                                    <div data-ng-init="user = [3]"></div>
                                                @elseif($role->permission == 4)
                                                    <div data-ng-init="user_selected = [1,2,3,4]"></div>
                                                    <div data-ng-init="user = [4]"></div>
                                                @endif

                                            @elseif($role->model == 'order')
                                                @if($role->permission == 1 )
                                                    <div data-ng-init="order_selected = [1]"></div>
                                                    <div data-ng-init="order = [1]"></div>
                                                @elseif($role->permission == 2)
                                                    <div data-ng-init="order_selected = [1,2]"></div>
                                                    <div data-ng-init="order = [2]"></div>
                                                @elseif($role->permission == 3)
                                                    <div data-ng-init="order_selected = [1,2,3]"></div>
                                                    <div data-ng-init="order = [3]"></div>
                                                @elseif($role->permission == 4)
                                                    <div data-ng-init="order_selected = [1,2,3,4]"></div>
                                                    <div data-ng-init="order = [4]"></div>
                                                @endif

                                            @endif

                                        @endforeach

                                        @include("admin.role.form")

                                        <div>
                                            <md-button class="md-raised md-primary"  type="submit">Proceed</md-button>
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
    </div>

@endsection
