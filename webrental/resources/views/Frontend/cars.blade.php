@extends('frontend.layout')

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>List Mobil</strong></h1>
                <div class="custom-breadcrumbs"><a href="/">Home</a> <span class="mx-2">/</span> <strong>Cars</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>List Mobil</strong></h2>
            <p class="mb-5">Mobil paling mewah sebumi pertiwi dan seantero galaksi.</p>    
          </div>
        </div>

        <div class="row">
          @foreach ($cars as $car)
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="listing d-block  align-items-stretch">
              <div class="listing-img h-100 mr-4">
                <img src="{{ asset('frontend/images/' . $car->img . '.jpg') }}" alt="Image" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
              </div>
              <div class="listing-contents h-100">
                <h3>{{ $car->name }}</h3>
                <div class="rent-price">
                  <strong>Rp{{ $car->price_per_day }}</strong><span class="mx-1">/</span>day
                </div>
                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                  <div class="listing-feature pr-4">
                    <span class="caption">Bagasi:</span>
                    <span class="number">{{ $car->luggage }}</span>
                  </div>
                  <div class="listing-feature pr-4">
                    <span class="caption">Kursi:</span>
                    <span class="number">{{ $car->seat }}</span>
                  </div>
                  <div class="listing-feature pr-4">
                    <span class="number">{{ $car->availabilityStatus }}</span>
                  </div>
                </div>
                <div>
                  <p>{{ $car->description }}</p>
                  <p>
                      @if($car->availabilityStatus == 'Unavailable')
                          <a href="#" class="btn btn-info btn-sm disabled" aria-disabled="true">Unavailable</a>
                      @else
                          <a href="{{ route('rent', ['id' => $car->id]) }}" class="btn btn-primary btn-sm">Rent Now</a>
                      @endif
                  </p>
              </div>
              </div>
            </div>
          </div>
        @endforeach
          </div>
        
          <div class="d-flex justify-content-end">
            {{ $cars->links() }}
          </div>
            
          
        </div>
        </div>
        
        
    <!-- <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Mike Fisher</span>
                  <span>Owner, Ford</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('frontend/images/person_2.jpg') }}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Jean Stanley</span>
                  <span>Traveler</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('frontend/images/person_3.jpg') }}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Katie Rose</span>
                  <span >Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
@endsection