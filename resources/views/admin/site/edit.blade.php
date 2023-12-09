@extends('layouts.admin.master')


@section('body')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @include('admin.messages.messages')
            <div class="row mb-2">
                <div class="col-sm-6">
                    @can('view-site')<a href="{{url('')}}/{{app()->getLocale()}}/admin/site" class="float-left btn btn-info"><i class="fas fa-angle-double-left"> Back To Site</i></a>@endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('') }}/{{app()->getLocale()}}/admin/home">Home</a></li>
                        <li class="breadcrumb-item active">Site Edit</li>
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
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div ng-controller="PageController" layout="column" ng-cloak>
                            <md-content layout-padding class="mdl-shadow--4dp">
                                <div class="box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"></h3>
                                    </div>
                                </div>

                            
                                <form name="bvForm" method="post" action="{{ url('') }}/en/admin/site/update/{{$site->id}}">

                                    {{ csrf_field() }}
                                    
                                    <div ng-init="bv.sub_zone_id     = '{{ $site->sub_zone_id }}'"></div>
                                    <div ng-init="bv.site_code_id    = '{{ $site->site_code_id }}'"></div>
                                    <div ng-init="bv.site_name       = '{{ $site->site_name }}'"></div>
                                    <div ng-init="bv.contact         = '{{ $site->contact }}'"></div>
                                    <div ng-init="bv.address         = '{{ $site->address }}'"></div>
                                    <div ng-init="bv.status          = '{{ $site->status }}'"></div>
                                
                                    @include('admin.site.form')

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
@endsection


@section('extraJS')


    <script>
        $(function() {
            $('textarea#froala-editor').froalaEditor()
        });
    </script>


@endsection
