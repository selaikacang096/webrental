@extends('frontend.layout')

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Contact</strong></h1>
                <div class="custom-breadcrumbs"><a href="/">Home</a> <span class="mx-2">/</span> <strong>Contact</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h1><b>Kontak kami untuk merental Mobil</b></h1>
          <p><b>Anda bisa <a href="\cars">memesan mobil</a> secara Online melalui web ini dan juga bisa datang ke Toko Offline kami</b></p>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-8 mb-1" >
            <!-- <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Email address">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                </div>
              </div>
            </form> -->
          </div>
          <div class="col-lg-12 ">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Alamat:</span>
                  <span>Jalan Setiabudi UPI, Bandung, Indonesia</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+62 821 4000 3000</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>rental@murah.id</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection