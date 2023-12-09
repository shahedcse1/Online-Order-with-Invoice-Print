<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    //
    public function allOrderData($locale)
    {
        $allOrders = Order::orderBy('id', 'DESC')->get();

        return view('admin.order.index', compact('allOrders', 'locale'));
    }

    public function allOrderDataTest($locale)
    {
        $allOrders = Order::orderBy('id', 'DESC')->get();

        return view('admin.order.test', compact('allOrders', 'locale'));
    }

    public function store($locale, Request $request)
    {

        $allInput  = $request->all();

        $isValidate = Validator::make($allInput, [

            'name'              => 'required|string',
            'address'           => 'required|string',
            'phone'             => 'required|string',
            'product'           => 'required|string',
            'amount'            => 'required|string',
            'contact_name'      => 'required|string',
            'entry_date'        => 'required|string',
            'entry_time'        => 'required|string'

        ]);

        if($isValidate->fails()) {

            return response()->json(
                [
                    'error' => $isValidate->errors()
                ],
                422
            );
        }


        $lastUserOrder  = Order::where('phone', $request->phone)->latest('created_at')->first();

        if ($lastUserOrder && now()->diffInHours($lastUserOrder->created_at) < 24) {

            $remainingHours = 24 - now()->diffInHours($lastUserOrder->created_at);

            return redirect()->back()->with("alert-warning", "You have ordered a product recently. Please try again {$remainingHours} hours later.");

        } else {

            $order                  = new Order();

            $order->name            = $request->name;
            $order->address         = $request->address;
            $order->phone           = $request->phone;
            $order->product         = $request->product;
            $order->amount          = $request->amount;
            $order->note            = $request->note;
            $order->contact_name    = $request->contact_name;
            $order->contact_phone   = $request->contact_phone;
            $order->entry_date      = Carbon::parse($request->entry_date)->format('Y-m-d');
            $order->entry_time      = Carbon::parse($request->entry_time)->format('H:i:s');
            $order->created_by      = Auth::guard('web')->user()->id;

            $lastOrder              = Order::select('id', 'invoice')->orderBy('id', 'DESC')->first();

            if($lastOrder) {

                $lastReferenceId    = $lastOrder->invoice+1;

                $order->invoice     = $lastReferenceId;

            } else {

                $order->invoice     = 10000;

            }

            if($order->save()) {

                return redirect()->route('all.orders', $locale)->with('alert-success', 'Order Entry Successfully');

            }
        }
    }

    public function edit($locale, Order $order)
    {

        return view('admin.order.edit', compact('order', 'locale'));


    }

    public function update($locale, Request $request, Order $order)
    {

        $allInput  = $request->all();

        $isValidate = Validator::make($allInput, [

            'name'              => 'required|string',
            'address'           => 'required|string',
            'phone'             => 'required|string',
            'product'           => 'required|string',
            'amount'            => 'required|string',
            'contact_name'      => 'required|string',
            'entry_date'        => 'required|string',
            'entry_time'        => 'required|string'

        ]);

        if($isValidate->fails()) {

            return response()->json(
                [
                    'error' => $isValidate->errors()
                ],
                422
            );
        }


        $order->name            = $request->name;
        $order->address         = $request->address;
        $order->phone           = $request->phone;
        $order->product         = $request->product;
        $order->amount          = $request->amount;
        $order->note            = $request->note;
        $order->contact_name    = $request->contact_name;
        $order->contact_phone   = $request->contact_phone;
        $order->entry_date      = Carbon::parse($request->entry_date)->format('Y-m-d');
        $order->entry_time      = Carbon::parse($request->entry_time)->format('H:i:s');

        if($order->save()) {

            return redirect()->route('all.orders', $locale)->with('alert-success', 'Order Update Successfully');

        }

    }

    public function orderData($locale, Order $order)
    {

        return $order;

    }

    public function delete($locale, Order $order = null)
    {

        $order->delete();

        return redirect()->route('all.orders', $locale)->with('alert-danger', 'Order delete successfully');

    }

    public function downloadOrder()
    {

        $startDate              = Carbon::now()->subDays(7)->startOfDay();

        $endDate                = Carbon::now()->endOfDay();

        $lastSevenDaysOrders    = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        $customColumnNames      = ['Invoice', 'Name', 'Address', 'Phone', 'Product', 'Amount', 'Note', 'Contact Name', 'Contact Phone', 'Invoice Time'];

        $csv                    = implode(',', $customColumnNames) . PHP_EOL;

        foreach ($lastSevenDaysOrders as $data) {

            $csv .= implode(',', [$data->invoice, $data->name, $data->address, $data->phone, $data->product, $data->amount, $data->note, $data->contact_name, $data->contact_phone , $data->created_at]) . PHP_EOL;

        }

        $fileName = "OrdersData_".Carbon::now()->format('Y-m-d_H:i:s');

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '.csv"',
        ];

        return response()->make($csv, 200, $headers);

    }

    public function searchOrder($locale, Request $request)
    {

        if(isset($request->from_date) && isset($request->to_date) || isset($request->phone)) {

            if($request->from_date!=null && $request->to_date!=null) {

                $fromDate   = $request->from_date." 00:00:01";

                $toDate     = $request->to_date." 23:59:59";

                $allOrders = Order::whereBetween('created_at', [$fromDate, $toDate])->orderBy('id', 'DESC')->get();

            } else {

                $allOrders = Order::where('phone', $request->phone)->orderBy('id', 'DESC')->get();

            }

        } else {

            $allOrders = Order::orderBy('id', 'DESC')->get();

        }

        return view('admin.order.search-order', compact('allOrders', 'locale'));

    }

    public function sampleExcelFileDownload()
    {

        return Storage::download('public/orders.xlsx');

    }
}
