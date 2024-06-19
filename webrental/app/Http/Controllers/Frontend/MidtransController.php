<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Midtrans\Notification;
use App\Models\Rental;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        // Initialize the notification object from Midtrans
        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status;

        // Handle the notification status
        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {
                if ($fraudStatus == 'challenge') {
                    // Transaction is challenged by FDS
                    $this->updateRentalStatus($orderId, 'challenge');
                } else {
                    // Transaction is successful
                    $this->updateRentalStatus($orderId, 'success');
                }
            }
        } elseif ($transactionStatus == 'settlement') {
            // Transaction is successful
            $this->updateRentalStatus($orderId, 'success');
        } elseif ($transactionStatus == 'pending') {
            // Transaction is pending
            $this->updateRentalStatus($orderId, 'pending');
        } elseif ($transactionStatus == 'deny') {
            // Transaction is denied
            $this->updateRentalStatus($orderId, 'deny');
        } elseif ($transactionStatus == 'expire') {
            // Transaction is expired
            $this->updateRentalStatus($orderId, 'expire');
        } elseif ($transactionStatus == 'cancel') {
            // Transaction is canceled
            $this->updateRentalStatus($orderId, 'cancel');
        }
    }

    private function updateRentalStatus($orderId, $status)
    {
        // Find the rental record by order_id
        $rental = Rental::where('order_id', $orderId)->first();
        if ($rental) {
            $rental->status = $status;
            $rental->save();
        }
    }
}
