@extends('layouts.frontend')

@section('content')

  <!-- Favicons -->
  {{-- <link href="{{ url('frontend/folio/assets/img/favicon.png')}}" rel="icon"> --}}
  {{-- <link href="{{ url('frontend/folio/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i" rel="stylesheet"> --}}

  <!-- Vendor CSS Files -->
  {{-- <!-- <link href="{{ url('frontend/folio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --> --}}
  {{-- <link href="{{ url('frontend/folio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ url('frontend/folio/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ url('frontend/folio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ url('frontend/folio/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}

  <!-- Template Main CSS File -->
  <link href="{{ url('frontend/folio/assets/css/style.css') }}" rel="stylesheet">

    <!-- ======= Blog Single ======= -->
    <!--<div class="main-content paddsection">-->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
              <div class="row">
                <div class="container-main single-main">
                  <div class="col-md-12">
                    <div class="block-main mb-30">
                      <img src="{{ Storage::url($article->link) }}" class="img-responsive" alt="reviews2">
                      <div class="content-main single-post padDiv">
                        <div class="journal-txt">
                          <h4>{{$article->title}}</h4>
                        </div>
                        <div class="post-meta">
                          <ul class="list-unstyled mb-0">
                            <li class="author">by:<a href="#">{{$article->user->name}}</a></li>
                            <li class="date">date: {{$article->published}}</li>
                          </ul>
                        </div>
                        <p class="mb-30">{!! $article->content !!}</p>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     <!-- </div><!-- End Blog Single -->-->

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
