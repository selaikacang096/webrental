@extends('frontend.layout')

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-5">
                <div class="intro">
                    <h1><strong>{{ $car->name }}</strong></h1>
                    <div class="custom-breadcrumbs"><a href="/">Home</a> <span class="mx-2">/</span> <a href="/cars">Cars</a> <span class="mx-2">/</span> <strong>{{ $car->name }}</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Car Details</strong></h2>
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
                            <strong>${{ $car->price_per_day }}</strong><span class="mx-1">/</span>day
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
                        <div>
                            <p>{{ $car->description }}</p>
                            <p><a href="{{ route('rent', ['id' => $car->id]) }}" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
