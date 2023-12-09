@extends('layouts.admin.master')


@section('body')
    <section class="content-header">
        <div class="container-fluid">
            @include('admin.messages.messages')
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('all.orders', ['locale' => app()->getLocale()]) }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Excel File</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-2">

            <div class="col-md-6 col-sm-6 col-xs-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> Please Upload Excel File</h3>
                    </div>

                    <div class="card-body">

                        <form name="order_excel_upload" class="form" method="POST"
                            action="{{ route('excel.upload', ['locale' => app()->getLocale()]) }}"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="import_file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-info input-group-text"
                                            id="">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Uploaded Sample Excel File Download</h3>
                    </div>

                    <div class="card-body">

                        <a href="{{ route('sample.excel.file', ['locale' => app()->getLocale()]) }}">
                            <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-download"
                                    aria-hidden="true"></i> Download</button>
                        </a>

                    </div>

                </div>

            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


@section('extraJS')
    <script src="https://adminlte.io/themes/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection
