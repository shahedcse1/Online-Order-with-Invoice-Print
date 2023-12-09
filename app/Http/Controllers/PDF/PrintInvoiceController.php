<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Mpdf\Mpdf;

class PrintInvoiceController extends Controller
{
    public function index($locale, Request $request)
    {
        $allOrders = Order::whereIn('id', $request->invoice_print)->orderBy('id', 'DESC')->get();
        $customPaper = array(0, 0, 189.00, 308);

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        // Add the custom font
        $path = public_path() . '/fonts';

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [$path]),
            'fontData' => $fontData + [
                'solaimanLipi' => [
                    'R' => 'SolaimanLipi.ttf',
                    'useOTL' => 0xFF,
                ]
            ],
            'default_font' => 'solaimanLipi',
            'mode' => 'utf-8'
        ]);


        // Render the Blade view to a variable
        $html = view('admin.pdf.invoice', ['allOrders' => $allOrders->toArray()])->render();
        $mpdf->WriteHTML($html);

        // Output PDF to the browser or save it to a file
        $mpdf->Output('document.pdf', 'I');



        // Load custom font
        // $font = asset('fonts/kalpurush.ttf');  // Adjust the path and font file name accordingly


        // return $pdf->setPaper($customPaper, 'portrait')->stream('download.pdf');

    }
}
