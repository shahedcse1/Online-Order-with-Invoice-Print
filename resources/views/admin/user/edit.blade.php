@extends("layouts.admin.master")

@section('body')

    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">

                        @can('view-user')

                            <a href="{{url('')}}/{{app()->getLocale()}}/admin/user" class="float-left btn btn-info"><i class="fas fa-angle-double-left">All User</i></a>

                        @endcan

                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/{{app()->getLocale()}}/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8 offset-2">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New User Creation Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div ng-controller="UserController" layout="column" ng-cloak>

                                <md-content layout-padding>
                                    <form name="currentForm" method="POST" action="{{ url('') }}/en/admin/user/update/{{ $user->id }}">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                        <div data-ng-init="name     = '{{ $user->name }}'"></div>
                                        <div data-ng-init="phone    = '{{ $user->phone }}'"></div>
                                        <div data-ng-init="email    = '{{ $user->email }}'"></div>
                                        <div data-ng-init="role     = '{{ $user->role_id }}'"></div>
                                        <div data-ng-init="status   = '{{ $user->status }}'"></div>
                                        <div data-ng-init="remarks  = '{{ $user->remarks }}'"></div>


                                        <md-input-container class="md-block">
                                            <label>Name</label>
                                            <input type="text" md-maxlength="25" required md-no-asterisk name="name" ng-model="name">
                                            <div ng-messages="currentForm.name.$error">
                                                <div ng-message="required">This is required.</div>
                                                <div ng-message="md-maxlength">The description must be less than 25 characters long.</div>
                                            </div>
                                        </md-input-container>


                                        <md-input-container class="md-block">
                                            <label>Phone</label>
                                            <input required type="text" name="phone" required ng-model="phone"
                                                   minlength="11" maxlength="14"/>

                                            <div ng-messages="currentForm.phone.$error" role="alert">
                                                <div ng-message-exp="['required', 'minlength', 'maxlength']">
                                                    Your phone must be between 11 and 14 characters long and looks like an +88 or 01.
                                                </div>
                                            </div>
                                        </md-input-container>


                                        <md-input-container class="md-block">
                                            <label>Email</label>
                                            <input required type="email" name="email" ng-model="email"
                                                   minlength="10" maxlength="100" ng-pattern="/^.+@.+\..+$/" />

                                            <div ng-messages="currentForm.email.$error" role="alert">
                                                <div ng-message-exp="['required', 'minlength', 'maxlength', 'pattern']">
                                                    Your email must be between 10 and 100 characters long and look like an e-mail address.
                                                </div>
                                            </div>
                                        </md-input-container>



                                        <md-input-container class="md-block">
                                            <label>Password</label>
                                            <br>
                                            <small class="text-danger">Keep the password <strong>blank</strong> if you do not want to change the password.</small>
                                            <input type="password" id="password" md-maxlength="25" md-no-asterisk name="password" ng-model="password">
                                            <div ng-messages="currentForm.password.$error">
                                                <div ng-message="required">This is required.</div>
                                            </div>
                                        </md-input-container>


                                        <div layout="row">
                                            <md-input-container flex="50">
                                                <label>Role</label>
                                                <md-select name="role" ng-model="role" required>

                                                    @foreach(\App\Models\Role::all() as $role)

                                                        <md-option value="{{ $role->id }}">{{ $role->title }}</md-option>

                                                    @endforeach

                                                </md-select>

                                            </md-input-container>

                                            <md-input-container flex="50">
                                                <label>Status</label>
                                                <md-select name="status" ng-model="status" required>
                                                    <md-option value="1">Active</md-option>
                                                    <md-option value="0">Inactive</md-option>
                                                </md-select>
                                            </md-input-container>


                                        </div>


                                        <md-input-container class="md-block">
                                            <label>Remarks</label>
                                            <input type="text" md-maxlength="25" md-no-asterisk name="remarks" ng-model="remarks">
                                            <div ng-messages="currentForm.remarks.$error">
                                                <div ng-message="required">This is required.</div>
                                                <div ng-message="md-maxlength">The description must be less than 250 characters long.</div>
                                            </div>
                                        </md-input-container>


                                        <div>
                                            <md-button ng-if="currentForm.$valid" class="md-raised md-primary"  type="submit">Proceed</md-button>
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
