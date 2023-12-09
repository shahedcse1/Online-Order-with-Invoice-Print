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
                        <li class="breadcrumb-item active">Search Orders</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary card-outline">

                    <div class="card-header">
                        <h3 class="card-title">Search Order</h3>
                    </div>

                    <form name="order_excel_upload" method="GET"
                        action="{{ route('search.order', ['locale' => app()->getLocale()]) }}"
                        enctype="multipart/form-data">

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>From Date:</label>
                                        <div class="input-group date" id="fromDate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#fromDate" name="from_date"
                                                @if (isset($_GET['from_date'])) value="{{ $_GET['from_date'] }}"

                                                @else

                                                value="{{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d') }}" @endif />
                                            <div class="input-group-append" data-target="#fromDate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        <input type="text" class="form-control datetimepicker-input" name="phone" />
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>To Date:</label>
                                        <div class="input-group date" id="toDate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#toDate" name="to_date"
                                                @if (isset($_GET['to_date'])) value="{{ $_GET['to_date'] }}"

                                                @else

                                                value="{{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d') }}" @endif />
                                            <div class="input-group-append" data-target="#toDate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-md-12">

                <div class="card card-primary card-outline">

                    <div class="card-header">
                        <h3 class="card-title">Orders Data</h3>
                    </div>
                    <div class="card-body my__content">
                        <table id="bootstrap-table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Products</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Contact Name</th>
                                    <th>Contact Phone</th>
                                    <th>Entry Date</th>
                                    <th>Entry Time</th>

                                </tr>
                            </thead>

                            <tbody class="print__body">

                                @foreach ($allOrders as $order)
                                    <tr class="print__tr">
                                        <td id="tbl-data-invoice-{{ $order->id }}">{{ $order->invoice }}</td>
                                        <td id="tbl-data-name-{{ $order->id }}">{{ $order->name }}</td>
                                        <td id="tbl-data-address-{{ $order->id }}">{{ $order->address }}</td>
                                        <td id="tbl-data-phone-{{ $order->id }}">{{ $order->phone }}</td>
                                        <td id="tbl-data-product-{{ $order->id }}">{{ $order->product }}</td>
                                        <td id="tbl-data-amount-{{ $order->id }}">{{ $order->amount }}</td>
                                        <td id="tbl-data-note-{{ $order->id }}">{{ $order->note }}</td>
                                        <td>{{ $order->contact_name }}</td>
                                        <td>{{ $order->contact_phone }}</td>
                                        <td>{{ $order->entry_date }}</td>
                                        <td>{{ $order->entry_time }}</td>

                                    </tr>
                                @endforeach

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Products</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Contact Name</th>
                                    <th>Contact Phone</th>
                                    <th>Entry Date</th>
                                    <th>Entry Time</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


@section('extraJS')
    <script>
        $('#fromDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#toDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>
@endsection
