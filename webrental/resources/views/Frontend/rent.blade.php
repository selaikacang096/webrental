@extends('frontend.layout')

@section('content')

<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-5">
                <div class="intro">
                    <h1><strong>Rent the Car</strong></h1>
                    <div class="custom-breadcrumbs"><a href="/">Home</a> <span class="mx-2">/</span> <a href="/cars">Cars</a> <span class="mx-2">/</span> <strong>Rent</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Rent {{ $car->name }}</strong></h2>
                <p class="mb-5">{{ $car->description }}</p>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="{{ asset('frontend/images/' . $car->img . '.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>{{ $car->name }}</h3>
                        <div class="rent-price">
                            <strong>Rp{{ number_format($car->price_per_day, 0, ',', '.') }}</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                            <div class="listing-feature pr-4">
                                <span class="caption">Luggage:</span>
                                <span class="number">{{ $car->luggage }}</span>
                            </div>
                            <div class="listing-feature pr-4">
                                <span class="caption">Passenger:</span>
                                <span class="number">{{ $car->seat }}</span>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>



        <h1 class="bold">Fill the Form Below to Rent</h1>

        @if ($errors->any())  <!-- error handling -->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('rent.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="customer_email">Customer Email:</label>
                        <input type="email" name="customer_email" id="customer_email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="pickup_date">Pickup Date:</label>
                        <input type="date" name="pickup_date" id="pickup_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="dropoff_date">Dropoff Date:</label>
                        <input type="date" name="dropoff_date" id="dropoff_date" class="form-control" required>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="driver" name="driver" value="yes">
                        <label class="form-check-label" for="driver">Include Driver</label>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Total Price:</label>
                        <p id="total_price" class="form-control-static font-weight-bold">Rp0</p>
                    </div>

                    <div class="container form-group">
                        <button id="rent-button" class="btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  -->






<!--  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pricePerDay = {{ $car->price_per_day }};
        const driverFee = 500000;
        const pickupDateInput = document.getElementById('pickup_date');
        const dropoffDateInput = document.getElementById('dropoff_date');
        const driverCheckbox = document.getElementById('driver');
        const totalPriceElement = document.getElementById('total_price');

        function calculateTotalPrice() {
            const pickupDate = new Date(pickupDateInput.value);
            const dropoffDate = new Date(dropoffDateInput.value);
            if (pickupDate && dropoffDate && dropoffDate >= pickupDate) {
                const timeDiff = Math.abs(dropoffDate - pickupDate);
                const diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // including the last day
                let totalPrice = pricePerDay * diffDays;
                if (driverCheckbox.checked) {
                    totalPrice += driverFee;
                }
                totalPriceElement.textContent = `Rp${totalPrice.toLocaleString()}`;
            } else {
                totalPriceElement.textContent = 'Rp0';
            }
        }

        pickupDateInput.addEventListener('change', calculateTotalPrice);
        dropoffDateInput.addEventListener('change', calculateTotalPrice);
        driverCheckbox.addEventListener('change', calculateTotalPrice);
    });
</script>

@endsection
