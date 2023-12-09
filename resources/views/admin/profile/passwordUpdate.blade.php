@extends("layouts.admin.master")
@section('body')

<div class="">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit your password</h1>
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
            <h3 class="card-title">Change Password Form</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            @if($flash = session('updatedSuccessfully'))
            <h4 class="text-success">{{ $flash }}</h4>
            @endif

            <div ng-controller="UserController" layout="column" ng-cloak>

              <md-content layout-padding>
                <form name="currentForm" method="POST" action="{{ url('') }}/en/admin/profile/password">
                  {{ method_field('PUT') }}
                  {{ csrf_field() }}


                  <div data-ng-init="name = '{{ $user->name }}'"></div>
                  <div data-ng-init="email = '{{ $user->email }}'"></div>

                  <md-input-container class="md-block">

                    <label>Current Password</label>

                    <input type="password" md-maxlength="25" required md-no-asterisk name="current_password"
                      ng-model="current_password">

                    <div ng-messages="currentForm.current_password.$error">

                      <div ng-message="required">This is required.</div>
                    </div>


                    @if ($flash = session('currentPasswordError'))

                    <div ng-messages="bvForm.password_confirmation.$error">

                      {{ $flash }}

                    </div>

                    @endif

                  </md-input-container>

                  <md-input-container class="md-block">
                    <label>New Password</label>
                    <input type="password" id="password" md-maxlength="25" required md-no-asterisk name="password"
                      ng-model="password">
                    <div ng-messages="currentForm.password.$error">
                      <div ng-message="required">This is required.</div>
                    </div>
                  </md-input-container>




                  <md-input-container class="md-block">
                    <label>Confirm New Password</label>
                    <input type="password" id="password-confirm" md-maxlength="25" required md-no-asterisk
                      name="password_confirmation" ng-model="password_confirmation">
                    <div ng-messages="currentForm.password_confirmation.$error">
                      <div ng-message="required">This is required.</div>
                    </div>

                    @if ($errors->has('password'))
                    <div ng-messages="currentForm.password_confirmation.$error">
                      {{ $errors->first('password') }}
                    </div>
                    @endif

                  </md-input-container>

                  <div>
                    <md-button ng-if="currentForm.$valid" class="md-raised md-primary" type="submit">Proceed</md-button>
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
