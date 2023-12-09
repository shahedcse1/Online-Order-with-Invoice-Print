<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class OrdersImport implements ToModel, WithHeadingRow, WithUpserts, WithUpsertColumns, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {

    //     $decimalValue = $row['entry_time'];

    //     $totalSeconds = $decimalValue * 24 * 60 * 60;

    //     $carbonInstance = Carbon::now('Asia/Dhaka')->startOfDay()->addSeconds($totalSeconds);

    //     return new Order([

    //         'invoice'               => $row['invoice'],
    //         'invoice_reference'     => $row['invoice_reference'],
    //         'name'                  => $row['name'],
    //         'address'               => $row['address'],
    //         'phone'                 => $row['phone'],
    //         'product'               => $row['product'],
    //         'amount'                => $row['amount'],
    //         'note'                  => $row['note'],
    //         'contact_name'          => $row['contact_name'],
    //         'contact_phone'         => $row['contact_phone'],
    //         'entry_date'            => gmdate('Y-m-d', ($row['entry_date']-25569)* 86400),
    //         'entry_time'            => $carbonInstance->format('H:i'),
    //         'created_by'            => $row['created_by'],
    //     ]);
    // }

    public function model(array $row)
    {

        $nextInvoiceNumber = Order::getNextInvoiceNumber();

        return new Order([

            'invoice'               => $nextInvoiceNumber,
            'name'                  => $row['name'],
            'address'               => $row['address'],
            'phone'                 => $row['phone'],
            'product'               => $row['product'],
            'amount'                => $row['amount'],
            'note'                  => $row['note'],
            'contact_name'          => $row['contact_name'],
            'contact_phone'         => $row['contact_phone'],
            'entry_date'            => Carbon::now()->format('Y-m-d'),
            'entry_time'            => Carbon::now()->format('H:i'),

        ]);
    }

    public function uniqueBy()
    {
        return 'invoice';
    }

    public function upsertColumns()
    {
        return ['invoice'];
    }


    public function batchSize(): int
    {
        return 300;
    }


    public function chunkSize(): int
    {
        return 300;
    }
}
