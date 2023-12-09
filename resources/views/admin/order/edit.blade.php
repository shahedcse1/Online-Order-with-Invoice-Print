@extends('layouts.admin.master')

@section('body')
    <section class="content-header">
        <div class="container-fluid">
            @include('admin.messages.messages')
            <div class="row mb-2">

                <div class="col-sm-6">
                    @can('view-order')
                        <a href="{{ route('all.orders', ['locale' => app()->getLocale()]) }}" class="float-left btn btn-info"><i
                                class="fas fa-angle-double-left"> Back to All Orders</i></a>
                    @endcan
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('all.orders', ['locale' => app()->getLocale()]) }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12 col-sm-6 col-xs-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Data Entry</h3>
                    </div>

                    <div class="card-body">

                        <form name="data_entry_form" class="form" method="POST"
                            action="{{ route('order.update', ['locale' => app()->getLocale(), 'order' => $order->id]) }}">

                            @csrf

                            {{-- <div class="form-group">
                                <label for="invoice">Invoice</label>
                                <input type="text" class="form-control" name="invoice" id="invoice" required value="{{ $order->invoice }}" readonly disabled>
                            </div> --}}

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    value="{{ $order->name }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" name="address" id="address" required>{{ $order->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" required
                                    value="{{ $order->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="product">Products</label>
                                <input type="text" class="form-control" name="product" id="product" required
                                    value="{{ $order->product }}">
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" min="1" max="500000" name="amount"
                                    id="amount" required step="0.5" value="{{ $order->amount }}">
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea type="text" class="form-control" name="note" id="note" required>{{ $order->note }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="contact_name">Contact Name</label>
                                <input type="text" class="form-control" name="contact_name" id="contact_name" required
                                    value="{{ $order->contact_name }}">
                            </div>

                            <div class="form-group">
                                <label for="contact_phone">Contact Phone</label>
                                <input type="text" class="form-control" name="contact_phone" id="contact_phone" required
                                    value="{{ $order->contact_phone }}">
                            </div>

                            <div class="form-group">
                                <label for="entry_date">Entry Date</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" name="entry_date" id="entry_date" required
                                        value="{{ \Carbon\Carbon::parse($order->entry_date)->format('m/d/Y') }}" />
                                    <div class="input-group-append" data-target="#reservationdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="entry_time">Entry Time</label>
                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#timepicker" name="entry_time" id="entry_time" required
                                        value="{{ $order->entry_time }}" />
                                    <div class="input-group-append" data-target="#timepicker"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
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

            </div>


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection




@section('extraJS')
    <script>
        $('#timepicker').datetimepicker({

            format: 'LT'

        });

        $('#reservationdate').datetimepicker({

            format: 'L'

        });
    </script>
@endsection
