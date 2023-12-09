@extends('layouts.admin.master')

<style>
    @media print {

        tbody button,
        tbody tr {
            display: none;
        }

        tbody tr.print {
            display: table-row
        }
    }

    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 0 1mm 0 1mm;
        margin: 0 auto;
        width: 50mm;
        background: #FFF;
        /*margin:0 15px 15px 15px;*/


        ::selection {
            background: #f31544;
            color: #FFF;
        }

        ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top,
        #mid,
        #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top {
            min-height: 100px;
        }

        #mid {
            min-height: 80px;
        }

        #bot {
            min-height: 50px;
        }

        #top .logo {
            /*float: left;*/
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        .info {
            display: block;
            /*float:left;*/
            margin-left: 0;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            /*padding: 5px 0 5px 15px;*/
            /*border: 1px solid #EEE*/
        }

        .tabletitle {
            /*padding: 5px;*/
            font-size: .5em;
            background: #EEE;
        }

        .service {
            border-bottom: 1px solid #EEE;
        }

        .item {
            width: 24mm;
        }

        .itemtext {
            font-size: .5em;
        }

        #legalcopy {
            margin-top: 5mm;
        }
    }

    .service__table td {
        font-size: 10px;
    }

    button {

        margin-bottom: 5px;

    }
</style>

@section('body')
    @php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    @endphp
    <section class="content-header">
        <div class="container-fluid">
            @include('admin.messages.messages')
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('') }}/{{ app()->getLocale() }}/admin/home">Home</a>
                        </li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Data Entry</h3>
                    </div>

                    <div class="card-body">

                        <form name="data_entry_form" class="form" method="POST"
                            action="{{ route('order.store', ['locale' => app()->getLocale()]) }}">

                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    value="" onkeyup="inputDataName()">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" name="address" id="address" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" required
                                    value="" onkeyup="inputDataPhone()">
                            </div>

                            <div class="form-group">
                                <label for="product">Products</label>
                                <input type="text" class="form-control" name="product" id="product" required>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" min="1" max="500000" name="amount"
                                    id="amount" required step="0.5">
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea type="text" class="form-control" name="note" id="note"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="contact_name">Contact Name</label>
                                <input type="text" class="form-control" name="contact_name" id="contact_name" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_phone">Contact Phone</label>
                                <input type="text" class="form-control" name="contact_phone" id="contact_phone" required>
                            </div>

                            <div class="form-group">
                                <label>Entry Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" name="entry_date" required
                                        value="{{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d') }}" />
                                    <div class="input-group-append" data-target="#reservationdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label>Entry Time</label>
                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#timepicker" name="entry_time" required
                                        value="{{ \Carbon\Carbon::now('Asia/Dhaka')->format('H:i') }}" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
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

            <div class="col-md-8 col-sm-6 col-xs-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of all orders</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-header">

                        <button type="button" class="btn btn-sm btn-info" id="checkBoxSelectUnselect">Check/Uncheck
                            All</button>
                        {{-- <button type="button" class="btn btn-sm btn-primary" id="printInvoiceNew"
                            style="display: none;">Print
                            Invoice</button> --}}

                        <button type="submit" form="printInvoice" class="btn btn-sm btn-primary" style="display: none;"
                            id="printInvoiceButton" target="_blank">
                            Print Invoice
                        </button>

                        <button type="submit" class="btn btn-sm btn-warning" form="downloadOrder">
                            <i class="fa fa-download" aria-hidden="true"></i> Download
                        </button>

                        <form action="{{ route('print.invoice', ['locale' => app()->getLocale()]) }}" method="post"
                            id="printInvoice">@csrf</form>

                        <form method="get" action="{{ route('download.order', ['locale' => app()->getLocale()]) }}"
                            id="downloadOrder">

                        </form>

                        <div class="card-body my__content">
                            <table id="bootstrap-table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Table ID</th>
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
                                        @can(['delete-order', 'update-order'])
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>

                                <tbody class="print__body">

                                    @foreach ($allOrders as $order)
                                        <?php
                                        $orderData = json_encode($order->toArray(), true);
                                        ?>
                                        <tr class="print__tr" data-data="{{ htmlspecialchars($orderData) }}">


                                            <td>
                                                <div class="tr_barcode" style="display: none"
                                                    data-data="{{ $generator->getBarcode($order->invoice, $generator::TYPE_CODE_128) }}">
                                                </div>

                                                <input type="checkbox" name="invoice_print[]" class="invoice-checkbox"
                                                    id="tbl-data-invoice-print-{{ $order->id }}" form="printInvoice"
                                                    value="{{ $order->id }}">
                                                {{ $order->id }}
                                            </td>

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

                                            @can(['delete-order', 'update-order'])
                                                <td style="display:flex; align-item:center;">

                                                    <a href="{{ url('') }}/en/admin/order/edit/{{ $order->id }}"
                                                        class="btn btn-xs btn-info" type="button" role="button">
                                                        Edit</a>

                                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger" type="button"
                                                        role="button" onclick="deleteData({{ $order->id }})"> Delete</a>

                                                    <input type="hidden" name="_token" id="csrf_token"
                                                        value="{{ csrf_token() }}">

                                                    <a href="javascript:void(0)" type="button" role="button"
                                                        class="btn btn-xs btn-warning"
                                                        onclick="posPrintData({{ $order->id }})">Invoice_Generate</a>

                                                </td>
                                            @endcan

                                        </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Table ID</th>
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
                                        @can(['delete-order', 'update-order'])
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </tfoot>



                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->

    <div class="modal fade" id="roleDeleteModal" role="dialog" aria-labelledby="modalData" aria-hidden="true">
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


    <div class="modal fade" id="invoicePrint" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 44mm; margin: 0 auto;height: 100%;display: flex;align-items: center;"
            role="document">
            <div class="modal-content">
                <button type="button" class="close refresh-button" data-dismiss="modal" aria-label="Close"
                    style="
                    background-color: #00aeef;
                    border-radius: 100%;
                    color: #fff;
                    opacity: 1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 1.5rem;
                    height: 1.5rem;
                    padding: 0;
                    line-height: normal;
                    right: -36px;
                    position: absolute;
                    top: -16px;
                    /* font-size:1rem; */
                ">
                    <span aria-hidden="true">&times;</span>

                </button>

                <div id="invoice-POS" style="position: center;">
                    <center id="top">
                        <div class="logo"></div>
                        <div class="info">
                            <div style="display:flex; align-items:center;">

                                <img src="{{ asset('images/logo-v2-01-01.png') }}" width="40px" height="25px"
                                    alt="">

                                <div style="margin-left: 15px;font-size: small">Homemade food <br>for babies by Jafrin
                                </div>

                            </div>
                        </div>
                    </center>

                    <div id="mid">
                        <div class="info">
                            <div style="font-size: 10px"><b>Address: </b> 62 No. West Dolairpar, Dhaka</div>
                            <div style="font-size: 10px"> <b>Email: </b> jfrnspprt@gmail.com</div>
                            <div style="font-size: 10px"><b>Phone: </b> +88 01688-505501</div>
                        </div>
                    </div>

                    <div id="mid">

                        <div class="info">

                            <div style="display:flex;font-size: small; justify-content: space-between">

                                <div style="font-size: 10px"><b>Date: </b> <?= date('d-m-y') ?></div>

                                <div style="font-size: 10px; margin-left: 5px;"><b>Time: </b> <?= date('H:i:s') ?></div>

                            </div>

                        </div>
                    </div>

                    <div id="mid">

                        <div class="info">

                            <div style="display:flex; align-item:center;">

                                <div style="font-size: 10px;"><b> Invoice: </b></div>
                                <div class="invoice_number" id="invoice_number" style="font-size: 10px;"> </div>

                            </div>

                        </div>
                    </div>

                    <div id="bot">

                        <div id="table">

                            <table class="service__table">

                                <tr class="service">
                                    <td class="tableitem"><b>Name: </b></td>
                                    <td class="tableitem customerName"></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><b>Amount: </b></td>
                                    <td class="tableitem amount"></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><b>Address: </b></td>
                                    <td class="tableitem address"></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><b>Phone: </b></td>
                                    <td class="tableitem phone"></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><b>Product: </b></td>
                                    <td class="tableitem product"></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><b>Note: </b></td>
                                    <td class="tableitem note"></td>
                                </tr>

                            </table>
                        </div>

                        <div id="legalcopy">

                            <p class="legal" style="font-size: 10px"><strong>Thanks for your order!</strong></p>

                            <p class="legal" style="font-size: 10px; margin-bottom: 10px;">I agree to pay the above total
                                amount according to the policy</p>

                        </div>

                    </div>

                </div>

                <div id="legalcopy" style="width: 50mm;">

                    <button type="button" class="btn btn-info btn-sm btn-block" id="invoicePrintId"
                        data-dismiss="modal">Print</button>

                </div>
            </div>
        </div>
    </div>


    <template class="print__template">
        <div id="invoice-POS-Multiple" class="print__body" style="position: center;">
            <center id="top">
                <div class="logo"></div>
                <div class="info">
                    <div style="display:flex; align-items:center;">

                        <img src="{{ asset('images/logo-v2-01-01.png') }}" width="40px" height="25px"
                            alt="">

                        <div style="margin-left: 15px;font-size: small">Homemade food <br>for babies by Jafrin</div>

                    </div>
                </div>
            </center>

            <div id="mid">
                <div class="info">
                    <div style="font-size: 10px"><b>Address: </b> 62 No. West Dolairpar, Dhaka</div>
                    <div style="font-size: 10px"> <b>Email: </b> jfrnspprt@gmail.com</div>
                    <div style="font-size: 10px"><b>Phone: </b> +88 01688-505501</div>
                </div>
            </div>

            <div id="mid">

                <div class="info">

                    <div style="display:flex;font-size: small; justify-content: space-between">

                        <div style="font-size: 10px"><b>Datetime: </b>
                            {{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d H:i:s') }}
                        </div>

                    </div>

                </div>
            </div>

            <div id="bot">

                <div id="print__table">
                </div>

                {{-- <canvas id="print__barcode" style="height: 5mm;">

                </canvas> --}}

                <div class="barcode" style="text-align:center">
                    <div class="barcode__image" style="width: 130px; height: auto;"></div>
                    <div style="margin-top: -12px;font-size:small;" class="barcode__invoice"></div>
                </div>

                <div id="legalcopy">
                    <p class="legal" style="font-size: 10px"><strong>Thanks for your order!</strong></p>

                    <p class="legal" style="font-size: 10px; margin-bottom: 10px;">

                        I agree to pay the above total amount
                        according to the policy
                    </p>

                </div>
            </div>
            <div class="print__break"></div>
        </div>
    </template>
@endsection




@section('extraJS')
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

    <script>
        $(document).ready(function() {

            // Event listener for Print Invoice button
            $('#printInvoiceNew').on('click', function() {
                var selectedData = [];
                var htmlPrint = [];
                $('.print__body .invoice-checkbox:checked').each(function() {
                    var rowData = $(this).closest('tr').data('data');
                    var invoiceData = $(this).closest('tr').find('.tr_barcode').data('data');

                    console.log("invoiceData");
                    console.log(invoiceData);
                    // Filter properties before pushing to selectedData
                    var filteredData = {
                        invoice: rowData.invoice,
                        name: rowData.name,
                        address: rowData.address,
                        phone: rowData.phone,
                        product: rowData.product,
                        amount: rowData.amount,
                        note: rowData.note,
                        barcode: invoiceData,
                    };

                    selectedData.push(filteredData);
                });

                let printTemplate = $('.print__template').html();
                var printTemplateObject = $(printTemplate);

                selectedData.forEach(function(data) {

                    var table = `<table class="service__table">`;
                    Object.entries(data).forEach(function([key, value]) {
                        if (key != 'barcode') {
                            let keyVal = key[0].toUpperCase() + key.substring(1)
                            table += `<tr class="service">
                                    <td class="table__key"><b>${keyVal}: </b></td>
                                    <td class="table__value">${value}</td>
                                    `;
                        }
                    });

                    table += '</table>';

                    printTemplateObject.find('.barcode__image').html(data.barcode);
                    printTemplateObject.find('#print__table').html(table);


                    htmlPrint += '<div class="print_body">' + printTemplateObject.html() + '</div>';
                    printTemplateObject.find('.barcode__invoice').attr('src', '');
                    printTemplateObject.find('#print__table').empty();

                });

                // create new window
                // Open a new window
                var printWindow = window.open('', '_blank');

                // Generate HTML content for the new window
                var htmlContent = '<html><head><title>Print Invoice</title></head><body>';
                // Add CSS styles
                htmlContent += '<style>';
                htmlContent +=
                    `
                    html,body {
                        width: 50.00mm !important;
                        height: 81.5mm !important;
                        margin: 0 !important;
                        padding: 0 !important;
                    }
                    @media print {
                        html, body {
                        width: 50.00mm !important;
                        height: 81.5mm !important;
                        margin: 0 !important;
                        padding: 0 !important;
                        }
                        @page {
                          size: 50mm 150mm;
                        }

                        // @page {
                        // size: 50.00mm 81.5mm;
                        // margin: 0;
                        // }

                        /* Hide page number and title */
                        body::after {
                        content: none;
                        }
                    }
                    .print__break { page-break-after: always; }`;
                htmlContent += '</style>';
                htmlContent += htmlPrint
                // Close the HTML content
                htmlContent += '</body></html>';
                // Write the HTML content to the new window
                printWindow.document.write(htmlContent);
                // Close the document and trigger print
                printWindow.document.close();
                printWindow.print();
            });

            $('#checkBoxSelectUnselect').on('click', function() {

                var allChecked = $('.invoice-checkbox').length === $('.invoice-checkbox:checked')
                    .length;

                $('.invoice-checkbox').prop('checked', !allChecked);

                updatePrintButtonVisibility();

            });


            // Function to update the visibility of the Print Invoice button
            function updatePrintButtonVisibility() {

                var anyChecked = $('.invoice-checkbox:checked').length > 0;

                $('#printInvoiceButton').toggle(anyChecked);

            }

            // Event listener for individual checkboxes

            $('.invoice-checkbox').on('change', function() {

                updatePrintButtonVisibility();

            });

        });

        $('#timepicker').datetimepicker({
            format: 'LT'
        });

        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        function inputDataName() {

            var name = $("#name").val();

            $("#contact_name").val(name);

        }

        function inputDataPhone() {

            var phone = $("#phone").val();

            $("#contact_phone").val(phone);

        }


        function posPrintData(orderId) {

            $("#invoice_number").html($("#tbl-data-invoice-" + orderId).html());
            $(".customerName").html($("#tbl-data-name-" + orderId).text());
            $(".amount").html($("#tbl-data-amount-" + orderId).text());
            $(".address").html($("#tbl-data-address-" + orderId).text());
            $(".phone").html($("#tbl-data-phone-" + orderId).text());
            $(".product").html($("#tbl-data-product-" + orderId).text());
            $(".note").html($("#tbl-data-note-" + orderId).text());
            $('#invoicePrint').modal('show');

        }

        $("#invoicePrintId").click(function(event) {

            event.preventDefault();

            $('#invoicePrint').modal('hide');

            var element = $("#invoice-POS")[0];

            html2canvas(element).then(function(canvas) {

                var imageURL = canvas.toDataURL("image/png");

                console.log(imageURL);

                var tmp = window.open("");

                $(tmp.document.body)

                    .html("<img src=" + imageURL + ">")
                    .ready(function() {
                        tmp.focus();
                        tmp.print();
                    })
            })
        });

        function capitalizeText(text) {
            return text.toLowerCase().replace(/(^|\s)\S/g, function(char) {
                return char.toUpperCase();
            });
        }


        function deleteData(tbleId) {

            var CSRF_TOKEN = document.getElementById("csrf_token").value;

            var invoice = $("#tbl-data-invoice-" + tbleId).html();

            $('#roleDeleteModal').modal('show');

            $("#formAction").empty();

            $('#modalData').text('You are about to delete the data ' + invoice);

            $("#formAction").append(
                "<form>\n" +
                "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>\n" +
                "</form>\n" +
                "<form method=\"POST\"  action=\"{{ url('') }}/en/admin/order/delete/" +
                tbleId +
                "\">\n" +
                "<input type=\"hidden\" name=\"_token\" value='" + CSRF_TOKEN + "'>\n" +
                "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">" +
                "<button type=\"submit\" class=\"btn btn-danger\">Confirm</button>\n" +
                "</form>"
            );
        }
    </script>
@endsection
