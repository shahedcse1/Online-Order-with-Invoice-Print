<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\OrdersImport;

class ExcelFileController extends Controller
{
    public function index()
    {

        return view('admin.excel.excel');

    }

    public function uploadData($locale, Request $request)
    {

        ini_set('memory_limit', '512M');

        if ($request->has('import_file')) {

            $result = Excel::import(new OrdersImport, $request->file('import_file'));

        } else {

            return redirect()->route('excel.file', $locale)->with('alert-danger', 'No file selected');
        }

        if($result) {

            return redirect()->route('all.orders', $locale)->with('alert-success', 'Excel Upload Successfully');

        } else {

            return redirect()->route('all.orders', $locale)->with('alert-danger', 'Failed to upload');

        }
    }
}
