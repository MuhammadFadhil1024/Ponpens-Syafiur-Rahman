@extends('layouts.frontend')

@section('content')

  <!-- Favicons -->
  <link href="{{ url('frontend/folio/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ url('frontend/folio/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="{{ url('frontend/folio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
  <link href="{{ url('frontend/folio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/folio/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/folio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/folio/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('frontend/folio/assets/css/style.css') }}" rel="stylesheet">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">

                  <div class="swiper-slide">
                    <img src="{{ url('frontend/folio/assets/img/portfolio/portfolio-details-1.jpg') }}" alt="">
                  </div>

                  <div class="swiper-slide">
                    <img src="{{ url('frontend/folio/assets/img/portfolio/portfolio-details-2.jpg') }}" alt="">
                  </div>

                  <div class="swiper-slide">
                    <img src="{{ url('frontend/folio/assets/img/portfolio/portfolio-details-3.jpg') }}" alt="">
                  </div>

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Informasi Kegiatan</h3>
                <ul>
                  <li><strong>Nama Kegiatan</strong>: Halal Bihalal</li>
                  <li><strong>Tanggal Pelaksanaan</strong>: 12 Maret 2022</li>
                  <li><strong>Tempat</strong>: Aula PPM SR</li>
                  <li><strong>Dokumentasi</strong>: <a href="#">www.example.com</a></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Halal Bihalal Santri dan Pengasuh PPM Syafi'ur Rohman</h2>
                <p>
                  Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi
                  labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque
                  itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur
                  dignissimos. Sequi nulla at esse enim cum deserunt eius.
                </p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->




  <!-- Vendor JS Files -->
  <script src="{{ url('frontend/folio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('frontend/folio/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('frontend/folio/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('frontend/folio/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('frontend/folio/assets/vendor/typed.js/typed.min.js') }}"></script>
  <script src="{{ url('frontend/folio/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('frontend/folio/assets/js/main.js') }}"></script>

  @endsection
