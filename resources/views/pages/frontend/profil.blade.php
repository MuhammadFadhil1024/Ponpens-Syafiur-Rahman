@extends('layouts.frontend')

@section('content')

<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left section-heading probootstrap-animate">
          <h1>PPM Syafi'ur Rohman</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="probootstrap-flex-block">
            <div class="probootstrap-text probootstrap-animate">
              <div class="text-uppercase probootstrap-uppercase">History</div>
              <h3>Take A Look at How We Begin</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
              <p><a href="#" class="btn btn-primary">Learn More</a></p>
            </div>
            <div class="probootstrap-image probootstrap-animate" style="background-image: url(img/slider_4.jpg)">
              <iframe src="https://www.youtube.com/embed/5lGzHr1lhgw" frameborder="0" class="btn-video popup-vimeo"><i class="icon-play3"></i></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">

      <div class="col-md-6">
        <p>
          <img src="{{ url('frontend/enlight-master/img/ppm2.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
        </p>
      </div>
      <div class="col-md-6 col-md-push-1">
        <h2>We are NYC based School focused on excellence.</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
        <p>Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
      </div>
    </div>
  </section>


  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12  text-center section-heading probootstrap-animate">
          <h2>VISI & MISI PPM SYAFI'UR ROHMAN</h2>
          <h3>Visi</h3>
          <p class="lead">Lembaga pendidikan alternatif yang memberikan layanan pendidikan dan pengajaran berkualitas, serasi dengan kondisi dan kebutuhan yang memiliki karakteristik khas dan tertentu serta menghasilkan alumni yang mandiri dan memiliki kepribadian jelas, berlandaskan Al-Qur’an dan Al-Hadist</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12  text-center section-heading probootstrap-animate">
          <h3>Visi</h3>
          <p class="lead">1. Menyelenggarakan Pendidikan dan Pengajaran berbasis Pondok Pesantren secara profesional, berkualitas, dan mandiri.</p>
          <p class="lead">2. Mengembangkan keilmuan dan pengetahuan berlandaskan Al-Qur’an dan Al-Hadits, menyebarluaskan dan sekaligus mentransform peserta didik agar memiliki akhlakul karimah.</p>
          <p class="lead">3. Menyiapkan peserta didik sebagai sarjana yang siap kerja, mandiri, dan berkepribadian.</p>
        </div>
      </div>
      <!-- END row -->
    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Pengasuh Pondok Pesantren</h2>
          <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
        </div>
      </div>
      <!-- END row -->


      <div class="row">
        @foreach ($pengasuh as $pengasuh)
        <div class="col-md-4 col-sm-6">
          <div class="probootstrap-teacher text-center probootstrap-animate">
            <figure class="media">
              <img src="{{ Storage::url($pengasuh->url) }}"alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
            </figure>
            <div class="text">
              <h6>{{$pengasuh->name}}</h6>
              <h5>{{$pengasuh->job}}</h5>
              <ul class="probootstrap-footer-social">
                <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Bimbingan Konseling Pondok Pesantren</h2>
          <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
        </div>
      </div>
      <!-- END row -->

      <div class="row">
        @foreach ($binkons as $binkon)
        <div class="col-md-4 col-sm-6">
          <div class="probootstrap-teacher text-center probootstrap-animate">
            <figure class="media">
              <img src="{{ Storage::url($binkon->url) }}"alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
            </figure>
            <div class="text">
              <h6>{{$binkon->name}}</h6>
              <h5>{{$binkon->job}}</h5>
              <ul class="probootstrap-footer-social">
                <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Dewan Guru Pondok Pesantren</h2>
          <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
        </div>
      </div>
      <!-- END row -->

      <div class="row">
        @foreach ($guru as $guru)
        <div class="col-md-4 col-sm-6">
          <div class="probootstrap-teacher text-center probootstrap-animate">
            <figure class="media">
              <img src="{{ Storage::url($binkon->url) }}"alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
            </figure>
            <div class="text">
              <h6>{{$guru->name}}</h6>
              <h5>{{$guru->job}}</h5>
              <ul class="probootstrap-footer-social">
                <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section>

@endsection
