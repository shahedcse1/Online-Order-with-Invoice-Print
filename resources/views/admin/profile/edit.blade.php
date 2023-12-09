@extends('layouts.admin.master')

@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit your profile</h1>
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
                        <h3 class="card-title">Profile Edit Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if ($flash = session('profileUpdated'))
                            <h4 class="text-success">{{ $flash }}</h4>
                        @endif

                        <div ng-controller="UserController" layout="column" ng-cloak>

                            <md-content layout-padding>
                                <form name="currentForm" method="POST"
                                    action="{{ url('') }}/en/admin/profile/update">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}


                                    <div data-ng-init="name = '{{ $user->name }}'"></div>
                                    <div data-ng-init="email = '{{ $user->email }}'"></div>


                                    <md-input-container class="md-block">
                                        <label>Name</label>
                                        <input type="text" md-maxlength="25" required md-no-asterisk name="name"
                                            ng-model="name">
                                        <div ng-messages="currentForm.name.$error">
                                            <div ng-message="required">This is required.</div>
                                            <div ng-message="md-maxlength">The description must be less than 25 characters
                                                long.</div>
                                        </div>
                                    </md-input-container>





                                    <md-input-container class="md-block">
                                        <label>Email</label>
                                        <input required type="email" name="email" ng-model="email" minlength="10"
                                            maxlength="100" ng-pattern="/^.+@.+\..+$/" />

                                        <div ng-messages="currentForm.email.$error" role="alert">
                                            <div ng-message-exp="['required', 'minlength', 'maxlength', 'pattern']">
                                                Your email must be between 10 and 100 characters long and look like an
                                                e-mail address.
                                            </div>
                                        </div>
                                    </md-input-container>


                                    {{-- @{{ media }} --}}
                                    {{-- @{{ media_selected }} --}}
                                    <div>
                                        <md-button ng-if="currentForm.$valid" class="md-raised md-primary"
                                            type="submit">Proceed</md-button>
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
