@extends('layouts.admin.master')

@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @can('view-role-module')

                        <a href="{{url('')}}/en/admin/role_module" class="float-left btn btn-info"><i class="fas fa-angle-double-left"> Back To Role Module</i></a>

                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('') }}/{{app()->getLocale()}}/admin/home">Home</a></li>
                        <li class="breadcrumb-item active">Role Module</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Role Module</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{url('')}}/en/admin/role_module/update/{{$roleModule->id}}"  id="formUpdate" method="POST" id="editRoleModule" name="editCategory" enctype="multipart/form-data" >
                            @csrf

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="{{'form-group required'.$errors->first('title',' has-error')}}">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" required value="{{$roleModule->title}}">
                                        <div class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="float-right btn btn-primary">Proceed</button>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

