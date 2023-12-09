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
                    
                    @can('create-site') <a href="{{route('create.site',['locale'=>app()->getLocale()])}}" role="button" type="button" class="btn btn-info btn-sm"> Create Site </a> @endcan 

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('') }}/{{app()->getLocale()}}/admin/home">Home</a></li>
                        <li class="breadcrumb-item active">Site</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="box-body table-responsive table-wrapper">
							<table class="table table-bordered table-responsive example_table" id="example_table">
                                <thead>
	                                <tr>
                                        <th>SL</th>
                                        <th>Cluster Name</th>                                        
                                        <th>Zone Name</th>
                                        <th>SubZone Name</th>
                                        <th>Site Name</th>
                                        <th>Site ID</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Contact Person</th>
	                                    <th>Status</th>
	                                    <th>Date Time</th>
                                        @can(['update-site', 'update-site'])
	                                    <th>Action</th>
                                        @endcan
	                                </tr>
                                </thead>

                                <tbody>

	                                @foreach($allSites as $key=>$siteData)
	                                    <tr>
                                            <td>{{$key+1}}</td>
                                            
                                            <td>{{$siteData->subzone->zone->cluster->name}}</td>

                                            <td>{{$siteData->subzone->zone->name}}</td>

                                            <td>{{$siteData->subzone->name}}</td>

                                            <td>{{$siteData->site_name}}</td>

                                            <td>{{$siteData->site_code_id}}</td>

                                            <td>{{$siteData->latitude}}</td>

                                            <td>{{$siteData->longitude}}</td>

	                                        <td>{{$siteData->contact }}</td>

	                                        <td>
                                                
                                                @if($siteData->status==0)
                                                    {{ __('Active') }}
                                                @else 
                                                    {{ __('Inactive') }}
                                                @endif

                                            </td>

	                                        <td>{{$siteData->created_at}}</td>

                                            @can(['update-site', 'update-site'])

	                                        <td>

	                                            <a href="{{ url('') }}/en/admin/site/edit/{{$siteData->id}}"><i class="fas fa-edit"></i></a>
	                                            | 

                                                <a href="javascript:void(0)"><i class="far fa-trash-alt" style="color:red;" onclick="deleteSite('<?= $siteData->id ?>')"></i></a>

                                                <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">

	                                        </td>

                                            @endcan
	                                    </tr>
	                                @endforeach

                                </tbody>

                                <tfoot>
	                                <tr>
                                        <th>SL</th>
                                        <th>Cluster Name</th>                                        
                                        <th>Zone Name</th>
                                        <th>SubZone Name</th>
                                        <th>Site Name</th>
                                        <th>Site ID</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Contact Person</th>
	                                    <th>Status</th>
	                                    <th>Date Time</th>
                                        @can(['update-site', 'update-site'])
	                                    <th>Action</th>
                                        @endcan
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

    <div class="modal fade" id="deleteSubZone" role="dialog" aria-labelledby="modalData" aria-hidden="true" style="display:none;">
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

            $("#example_table").DataTable({

                scrollX:        false,

            });
            
        });

        function deleteSite(siteId){

            var CSRF_TOKEN   = document.getElementById("csrf_token").value;

            $('#deleteSubZone').modal('show');

            $.ajax({

                type:"get",

                url:"{{url('')}}/en/admin/site/deleteId/"+siteId,

                success:function(response){

                    $("#formAction").empty();

                    $('#modalData').text('You are about to delete the zone '+response.name);

                    $("#formAction").append(
                        "<form>\n"+
                            "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>\n"+
                        "</form>\n"+
                        "<form method=\"POST\"  action=\"{{ url('') }}/en/admin/site/delete/"+siteId+"\">\n"+
                            "<input type=\"hidden\" name=\"_token\" value='"+CSRF_TOKEN+"'>\n"+
                            "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">"+
                            "<button type=\"submit\" class=\"btn btn-danger\">Confirm</button>\n"+
                        "</form>"
                    );
                }
            });
        }

    </script>

@endsection

