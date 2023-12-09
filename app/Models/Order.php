<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice', 'invoice_reference', 'name', 'phone', 'address', 'product',
        'amount', 'note', 'contact_name', 'contact_phone', 'entry_date', 'entry_time', 'created_by'
    ];


    public static function getNextInvoiceNumber()
    {
        $lastOrder = Order::latest('invoice')->first();

        if ($lastOrder) {

            $lastInvoiceNumber = $lastOrder->invoice;

            return $lastInvoiceNumber + 1;

        } else {

            return 10000;
        }
    }

}
