<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jafrin by Home Made</title>
    <style>
        .print__break {
            page-break-after: always;
        }

        .font__size {
            font-size: 8px;
        }

        body {
            font-family: 'solaimanLipi';
        }
    </style>
</head>

<body>

    @php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();

    @endphp


    @foreach ($allOrders as $order)
        <div id="invoice-POS-Multiple" class="print__body" style="position: center;">
            <center id="top">
                <div class="logo"></div>
                <div class="info">
                    <div style="display:flex; align-items:center;">

                        <img src="{{ public_path('images/logo-v2-01-01.png') }}" width="40px" height="25px"
                            alt="">

                        <div style="font-size: 10px">Homemade food <br>for babies by Jafrin</div>

                    </div>
                </div>
            </center>

            <div id="mid">
                <div class="info">
                    <div class="font__size"><b>Address: </b> 62 No. West Dolairpar, Dhaka</div>
                    <div class="font__size"> <b>Email: </b> jfrnspprt@gmail.com</div>
                    <div class="font__size"><b>Phone: </b> +88 01688-505501</div>
                </div>
            </div>

            <div id="mid">

                <div class="info">

                    <div style="display:flex;font-size: small; justify-content: space-between">

                        <div class="font__size"><b>Datetime: </b>
                            {{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d H:i:s') }}
                        </div>

                    </div>

                </div>
            </div>

            <div id="bot">

                <div id="print__table">
                    <table>

                        <tr class="service">
                            <td class="tableitem font__size"><b>Invoice:</b></td>
                            <td class="tableitem customerName font__size">{!! $order['invoice'] !!}</td>
                        </tr>

                        <tr class="service">
                            <td class="tableitem font__size"><b>Name:</b></td>
                            <td class="tableitem customerName font__size">{{ $order['name'] }}</td>
                        </tr>

                        <tr class="service">
                            <td class="tableitem font__size"><b>Amount:</b></td>
                            <td class="tableitem customerName font__size">{!! $order['amount'] !!}</td>
                        </tr>
                        <tr class="service">
                            <td class="tableitem font__size"><b>Address:</b></td>
                            <td class="tableitem customerName font__size">{!! $order['address'] !!}</td>
                        </tr>

                        <tr class="service">
                            <td class="tableitem font__size"><b>Phone:</b></td>
                            <td class="tableitem customerName font__size">{!! $order['phone'] !!}</td>
                        </tr>

                        <tr class="service">
                            <td class="tableitem font__size"><b>Product:</b></td>
                            <td class="tableitem customerName font__size">{!! $order['product'] !!}</td>
                        </tr>

                        <tr class="service">
                            <td class="tableitem font__size"><b>Note:</b></td>
                            <td class="tableitem customerName font__size">{!! $order['note'] !!}</td>
                        </tr>

                    </table>
                </div>

                <div class="barcode" style="text-align:center">
                    <div class="barcode__image" style="width: 130px; height: auto;">
                        {!! $generator->getBarcode($order['invoice'], $generator::TYPE_CODE_128) !!}
                    </div>
                    <div style="margin-top: 2px; font-size:small;" class="barcode__invoice">{{ $order['invoice'] }}
                    </div>
                </div>


                <div id="legalcopy">
                    <p class="legal font__size"><strong>Thanks for your order!</strong></p>

                    <p class="legal" style="font-size: 10px; margin-bottom: 10px;">
                        I agree to pay the above total amount
                        according to the policy
                    </p>

                </div>
            </div>
        </div>
        @if (!$loop->last)
            <div class="print__break"></div>
        @endif
    @endforeach
</body>

</html>
