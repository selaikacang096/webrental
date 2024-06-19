@extends('frontend.layout')

@section('content')
<div class="hero" style="background-image: url('frontend/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10">

              <div class="row mb-5">
                <div class="col-lg-7 intro">
                  <h1><strong>Sewa mobil</strong> semudah mengorder ojol.</h1>
                </div>
              </div>
              
              <!-- <form class="trip-form">
                
                <div class="row align-items-center">
                  
                  <div class="mb-3 mb-md-0 col-md-3">
                    <select name="" id="" class="custom-select form-control">
                      <option value="">Select Type</option>
                      <option value="">Ferrari</option>
                      <option value="">Toyota</option>
                      <option value="">Ford</option>
                      <option value="">Lamborghini</option>
                    </select>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-3">
                    <div class="form-control-wrap">
                      <input type="text" id="cf-3" placeholder="Pick up" class="form-control datepicker px-3">
                      <span class="icon icon-date_range"></span>

                    </div>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-3">
                    <div class="form-control-wrap">
                      <input type="text" id="cf-4" placeholder="Drop off" class="form-control datepicker px-3">
                      <span class="icon icon-date_range"></span>
                    </div>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-3">
                    <input type="submit" value="Search Now" class="btn btn-primary btn-block py-3">
                  </div>
                </div>
                
              </form> -->

            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <h2 class="section-heading"><strong>Cara mudah menyewa mobil</strong></h2>
          <p class="mb-5">3 langkah mudah untuk mendapatkan mobil</p>    

          <div class="row mb-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>1</span>
                <div class="step-inner">
                  <span class="number text-primary">01.</span>
                  <h3>Pilih Mobil</h3>
                  <p>Tentukan mobil favoritmu dan sesuaikan dengan kebutuhanmu</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>2</span>
                <div class="step-inner">
                  <span class="number text-primary">02.</span>
                  <h3>Isi tanggal sewa</h3>
                  <p>Cukup menentukan tanggal menyewa dan pengembalian serta data lainnya</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>3</span>
                <div class="step-inner">
                  <span class="number text-primary">03.</span>
                  <h3>Pembayaran</h3>
                  <p>Setelah langkah ini selesai, mobil langsung bisa kamu kendarai!</p>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-lg-4 mx-auto">
              <a href="#" class="d-flex align-items-center play-now mx-auto">
                <span class="icon">
                  <span class="icon-play"></span>
                </span>
                <span class="caption">Video how it works</span>
              </a>
            </div>
          </div> -->
        </div>
      </div>
      
      <div class="site-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 text-center order-lg-2">
              <div class="img-wrap-1 mb-5">
                <img src="frontend/images/feature_01.png" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-4 ml-auto order-lg-1">
              <h3 class="mb-4 section-heading"><strong>Anda juga bisa datang ke toko kami untuk langsung merental mobil.</strong></h3>
              <p class="mb-5">Dengan Mobil yang Berkualitas dan Supir yang handal, siap menemani perjalananmu menuju tempat-tempat yang tak terjangkau!</p>
              
              <p><a href="#listmobil" class="btn btn-primary">Lihat List Mobil</a></p>
            </div>
          </div>
        </div>
      </div>      

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading" id="listmobil"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        

        <div class="row">
          @foreach ($cars as $car)
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
                  <p>
                    <!-- <a href="#" class="btn btn-primary btn-sm">Rent Now</a> -->
                    <a href="{{ route('rent', ['id' => $car->id]) }}" class="btn btn-primary btn-sm">Rent Now</a>
                    <a href="{{ route('car.details', ['id' => $car->id]) }}" class="btn btn-info btn-sm">Details</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        
          <p><a href="/cars" class="btn btn-primary">Lihat Lebih Banyak</a></p>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Kelebihan Kami</strong></h2>
            <p class="mb-5">Tempat sewa dan rental mobil yang sangat bersahabat dan keren.</p>    
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 mb-3">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-home"></span>
              </span>
              <div class="service-1-contents">
                <h3>Rental Dari Rumah</h3>
                <p>Tidak perlu datang ke toko kami untuk merental mobil. cukup pesan dari Rumah!.</p>
                <p class="mb-0"><a href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-gear"></span>
              </span>
              <div class="service-1-contents">
                <h3>Banyak Pilihan Mobil</h3>
                <p>Tersedia berbagai jenis merek dan model yang siap memenuhi segala kebutuhanmu!.</p>
                <p class="mb-0"><a href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-watch_later"></span>
              </span>
              <div class="service-1-contents">
                <h3>Pesan dengan Cepat!</h3>
                <p>Tidak butuh banyak waktu untuk mendapatkan mobilmu, kami bisa antarkan mobil dalam waktu 2 jam sampai kerumah Anda!.</p>
                <p class="mb-0"><a href="#">Learn more</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-verified_user"></span>
              </span>
              <div class="service-1-contents">
                <h3>Keamanan Tinggi</h3>
                <p>Mobil berkualitas kami memiliki garansi serta tunjangan jika terjadi kecelakaan, tidak perlu khawatir dan nikmati saja perjalannya.</p>
                <p class="mb-0"><a href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-video_library"></span>
              </span>
              <div class="service-1-contents">
                <h3>Sewa dengan satu sentuhan</h3>
                <p>Halaman rental yang sangat memudahkan pengguna dengan tampilan yang ringkas dan mudah dipahami.</p>
                <p class="mb-0"><a href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-vpn_key"></span>
              </span>
              <div class="service-1-contents">
                <h3>Kunci menuju Dunia Luas</h3>
                <p>Sewa mobil kami dan jangkau daratan yang belum pernah dijelajah.</p>
                <p class="mb-0"><a href="#">Learn more</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Layanan kami telah dipercaya oleh banyak orang.</p>    
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Mobil yang sangat memuaskan, saya merasakan pengalaman yang sangat luar biasa ketika mengendarai mobil ini"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="frontend/images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Mike Fisher</span>
                  <span>Rektor</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Layanan yang diberikan sangatlah baik, tidak ada jalanan yang tidak bisa saya lewati dan tidak ada rental mobil lain yang akan saya beli selain disini"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="frontend/images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Jean Stanley</span>
                  <span>Dosen</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Saya dan keluarga saya sangat senang ketika menaiki mobil yang telah disewa disini, kami telah berlibur ke Gerlong Utara dengan mobil yang mengesankan ini"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="frontend/images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Katie Rose</span>
                  <span >Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection