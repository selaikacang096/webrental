<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Rental;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('frontend.invoice', compact('invoice'));
    }

    public function createInvoice(Rental $rental, $paymentStatus)
    {
        $invoice = Invoice::create([
            'rental_id' => $rental->id,
            'customer_name' => $rental->user_name,
            'customer_email' => $rental->user_email,
            'car_id' => $rental->car_id,
            'pickup_date' => $rental->rental_date,
            'dropoff_date' => $rental->return_date,
            'driver' => $rental->driver === 'yes',
            'total_price' => $rental->total_price,
            'payment_status' => $paymentStatus,
        ]);

        return $invoice;
    }
}
