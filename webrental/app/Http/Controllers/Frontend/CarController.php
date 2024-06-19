<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Midtrans\Config;

class CarController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-a5Yyre3XEqz14tE1g92rks-R';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public function index(){
        $cars = Car::paginate(9);
        return view('frontend.cars', compact('cars'));
    }   
        
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('frontend.car-details', compact('car'));
    }

    public function rent($id)
    {
        $car = Car::findOrFail($id);
        return view('frontend.rent', compact('car'));
    }

    public function submitRent(Request $request)
    {
        // Validate the request data
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date|after:pickup_date',
            'driver' => 'nullable|string|in:yes,no',
        ]);

        $car = Car::findOrFail($request->car_id);

        // Calculate rental duration and total price
        $pickupDate = new \DateTime($request->pickup_date);
        $dropoffDate = new \DateTime($request->dropoff_date);
        $interval = $pickupDate->diff($dropoffDate)->days + 1;
        $totalPrice = $interval * $car->price_per_day;

        if ($request->driver === 'yes') {
            $totalPrice += 500000;
        }

        // Create a transaction array
        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $totalPrice,
        ];

        $customerDetails = [
            'first_name' => $request->customer_name,
            'email' => $request->customer_email,
        ];

        $itemDetails = [
            [
                'id' => $car->id,
                'price' => $car->price_per_day,
                'quantity' => $interval,
                'name' => $car->name
            ],
        ];

        if ($request->driver === 'yes') {
            $itemDetails[] = [
                'id' => 'driver_fee',
                'price' => 500000,
                'quantity' => 1,
                'name' => 'Driver Fee'
            ];
        }

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
        ];

        // Get Snap payment page URL
        $snapToken = \Midtrans\Snap::getSnapToken($transactionData);

        // Save the rental with a unique order_id
        Rental::create([
            'user_name' => $request->customer_name, 
            'user_email' => $request->customer_email, 
            'car_id' => $request->car_id,
            'rental_date' => $request->pickup_date, 
            'return_date' => $request->dropoff_date, 
            'driver' => $request->driver ?? 'no', 
            'order_id' => $transactionDetails['order_id'], // Save the order_id
            'status' => 'pending',
        ]);


        // Pass the Snap token and totalPrice to the view
        return view('frontend.payment', compact('snapToken', 'car', 'request', 'totalPrice'));
    }

    // Add a route for the payment success callback
    public function paymentSuccess(Request $request)
    {
        $orderId = $request->input('order_id');
        $rental = Rental::where('order_id', $orderId)->firstOrFail();
    
        // Update rental status to 'paid'
        $rental->status = 'paid';
        $rental->save();
    
        // Create an invoice
        $invoice = new Invoice();
        $invoice->rental_id = $rental->id;
        $invoice->amount = $rental->total_price;
        $invoice->status = 'paid';
        $invoice->save();
    
        // Redirect to the invoice page
        return redirect()->route('invoice.show', $invoice->id);
    }

    // public function submitRent(Request $request)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'customer_name' => 'required|string|max:255',
    //         'customer_email' => 'required|email|max:255',
    //         'car_id' => 'required|exists:cars,id',
    //         'pickup_date' => 'required|date',
    //         'dropoff_date' => 'required|date|after:pickup_date',
    //         'driver' => 'nullable|string|in:yes,no', 
    //     ]);

    //     // Simulate payment processing
    //     $paymentSuccess = $this->processFakePayment();

    //     // Check if payment was successful
    //     if (!$paymentSuccess) {
    //         return back()->withErrors(['payment' => 'Payment failed. Please try again.']);
    //     }

    //     // Create a new rental record
    //     Rental::create([
    //         'user_name' => $request->customer_name, 
    //         'user_email' => $request->customer_email, 
    //         'car_id' => $request->car_id,
    //         'rental_date' => $request->pickup_date, 
    //         'return_date' => $request->dropoff_date, 
    //         'driver' => $request->driver ?? 'no', 
    //     ]);

    //     // Update the car's rental count and availability status
    //     $car = Car::find($request->car_id);
    //     $car->rental_count++;
    //     $car->availabilityStatus = 'Unavailable';
    //     $car->save();

    //     // Redirect to the cars page with a success message
    //     return redirect('/cars')->with('success', 'Pesanan Rental berhasil, silahkan datang dan lakukan pembayaran untuk mengambil mobil dan bawa dokumen penjamin seperti ktp!');
    // }
    // // Fake payment processing method
    // private function processFakePayment()
    // {
    //     // Simulate payment processing logic here
    //     // For the purpose of this example, we'll assume all payments succeed
    //     return true;
    // }
}
