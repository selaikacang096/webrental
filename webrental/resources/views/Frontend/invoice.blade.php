@extends('frontend.layout')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading"><strong>Invoice for {{ $invoice->customer_name }}</strong></h2>
                <p>Car: {{ $invoice->car->name }}</p>
                <p>Pickup Date: {{ $invoice->pickup_date }}</p>
                <p>Dropoff Date: {{ $invoice->dropoff_date }}</p>
                <p>Driver: {{ $invoice->driver ? 'Yes' : 'No' }}</p>
                <p>Total Price: Rp{{ number_format($invoice->total_price, 0, ',', '.') }}</p>
                <p>Payment Status: {{ ucfirst($invoice->payment_status) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
