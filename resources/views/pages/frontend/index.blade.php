@extends('layouts.frontend')

@section('content')

<section class="flexslider">
    <ul class="slides">
      @foreach ($banners as $banner)
        <li style="background-image: url({{ Storage::url($banner->url) }})" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate">{{$banner->title}}</h1>
                </div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </section>

  <section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left section-heading probootstrap-animate">
          <h2>Selamat Datang di PPM Syafi'ur Rohman</h2>
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
              <h3>Tentang Pondok Pesantren</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
              <p><a href="#" class="btn btn-primary">Learn More</a></p>
            </div>
            <div class="probootstrap-image probootstrap-animate" style="background-image: url({{ url('frontend/enlight-master/img/slider_3.jpg') }})">
              <iframe src="https://www.youtube.com/embed/5lGzHr1lhgw" frameborder="0" class="btn-video popup-vimeo"><i class="icon-play3"></i></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section" id="probootstrap-counter">
    <div class="container">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
          <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-users2"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="20203" data-speed="5000" data-refresh-interval="50">1</span>
              </span>
              <span class="probootstrap-counter-label">Santri PPM SR</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
          <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-user-tie"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="139" data-speed="5000" data-refresh-interval="50">1</span>
              </span>
              <span class="probootstrap-counter-label">Pengasuh Pondok</span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block visible-xs-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
          <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-library"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="99" data-speed="5000" data-refresh-interval="50">1</span>%
              </span>
              <span class="probootstrap-counter-label">Passing to Universities</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">

           <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-smile2"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="100" data-speed="5000" data-refresh-interval="50">1</span>%
              </span>
              <span class="probootstrap-counter-label">Tingkat Kepuasan</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url({{ url('frontend/enlight-master/img/slider_2.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center section-heading probootstrap-animate">
          <h2 class="mb0">Highlights</h2>
        </div>
      </div>
    </div>
    <div class="probootstrap-tab-style-1">
      <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
        <li class="active"><a data-toggle="tab" href="#featured-news">Artikel PPM SR</a></li>
        <li><a data-toggle="tab" href="#upcoming-events">Divisi PPM SR</a></li>
      </ul>
    </div>
  </section>

  <section class="probootstrap-section probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="tab-content">

            <div id="featured-news" class="tab-pane fade in active">
              <!-- DIVISI PPM SR -->
              <div class="row">
                <div class="col-md-12">
                  <div class="owl-carousel" id="owl1">
                  @foreach ($divisions as $item)
                  {{-- @php
                      dd($item)
                  @endphp --}}
                      <div class="item">
                        <a href="{{route('detaildivisi', $item->slug)}}" class="probootstrap-featured-news-box">
                          <figure class="probootstrap-media"><img width="200px" src="{{$item->divisiongallery()->exists() ? Storage::url($item->divisiongallery->first()->url) : "data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="}}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></figure>
                          <div class="probootstrap-text">
                            <h3>{{$item->name}}</h3>
                            <p>{!! Str::limit($item->description, 200) !!}</p>
                          </div>
                        </a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                    <!-- END item -->
              </div>
              <!-- END DIVISI PPM SR -->

              <!-- BUTTON ARTIKEL PPM SR -->
              <div class="row">
                <div class="col-md-12 text-center">
                  <p><a href="#" class="btn btn-primary">View all news</a></p>
                </div>
              </div>
              <!-- END BUTTON ARTIKEL PPM SR -->

            </div>
            <!-- ARTIKEL PPM SR -->
            <div id="upcoming-events" class="tab-pane fade">
              <div class="row">
                <div class="col-md-12">
                  <div class="owl-carousel" id="owl2">
                    <div class="item">
                      <a href="#" class="probootstrap-featured-news-box">
                        <figure class="probootstrap-media"><img src="{{ url('frontend/enlight-master/img/img_sm_3.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></figure>
                        <div class="probootstrap-text">
                          <h3>Tempora consectetur unde nisi</h3>
                          <span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
                          <span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
                        </div>
                      </a>
                    </div>
                    <!-- END item -->
                    <div class="item">
                      <a href="#" class="probootstrap-featured-news-box">
                        <figure class="probootstrap-media"><img src="{{ url('frontend/enlight-master/img/img_sm_1.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></figure>
                        <div class="probootstrap-text">
                          <h3>Tempora consectetur unde nisi</h3>
                          <span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
                          <span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
                        </div>
                      </a>
                    </div>
                    <!-- END item -->
                    <div class="item">
                      <a href="#" class="probootstrap-featured-news-box">
                        <figure class="probootstrap-media"><img src="{{ url('frontend/enlight-master/img/img_sm_2.jpg')}}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></figure>
                        <div class="probootstrap-text">
                          <h3>Tempora consectetur unde nisi</h3>
                          <span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
                          <span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
                        </div>
                      </a>
                    </div>
                    <!-- END item -->
                    <div class="item">
                      <a href="#" class="probootstrap-featured-news-box">
                        <figure class="probootstrap-media"><img src="{{ url('frontend/enlight-master/img/img_sm_3.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></figure>
                        <div class="probootstrap-text">
                          <h3>Tempora consectetur unde nisi</h3>
                          <span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
                          <span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
                        </div>
                      </a>
                    </div>
                    <!-- END item -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <p><a href="#" class="btn btn-primary">View all events</a></p>
                </div>
              </div>
            </div>
            <!-- END ARTIKEL PPM SR -->

          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Artikel PPM Syafi'ur Rohman</h2>
          <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
        @foreach ($articles as $item)
          <div class="col-md-6">
            <div class="probootstrap-service-2 probootstrap-animate">
              <div class="image">
                <div class="image-bg">
                  <img src="{{ Storage::url($item->link) }}" alt="Free Bootstrap Template by ProBootstrap.com">
                </div>
              </div>
              <div class="text">
                <span class="probootstrap-meta"><i class="icon-calendar2"></i> {{$item->published}}</span>
                <h3>{{$item->title}}</h3>
                <p>{!! Str::limit($item->content, 200) !!}</p>
                <p><a href="{{route('detailartikel', $item->slug)}}" class="btn btn-primary">Baca</a></p>
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
          <h2>Pengasuh Pondok Pesantren</h2>
          <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
        </div>
      </div>
      <!-- END row -->

      <div class="row">
      @foreach ($managements as $management)
        <div class="col-md-3 col-sm-6">
          <div class="probootstrap-teacher text-center probootstrap-animate">
            <figure class="media">
              <img src="{{ Storage::url($management->url) }}"alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
            </figure>
            <div class="text">
              <h6>{{$management->name}}</h6>
              <p>{{$management->job}}</p>
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
  </section>
  <section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial" style="background-image: url({{ url('frontend/enlight-master/img/slider_4.jpg') }});">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Alumni Testimonial</h2>
          <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
        <div class="col-md-12 probootstrap-animate">
          <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
            <div class="item">

              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="{{ url('frontend/enlight-master/img/person_1.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
                </figure>
                <blockquote class="quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author"> &mdash; <span>Mike Fisher</span></cite></blockquote>
              </div>

            </div>
            <div class="item">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="{{ url('frontend/enlight-master/img/person_2.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
                </figure>
                <blockquote class="quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite class="author"> &mdash;<span>Jorge Smith</span></cite></blockquote>
              </div>
            </div>
            <div class="item">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="{{ url('frontend/enlight-master/img/person_3.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
                </figure>
                <blockquote class="quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo; <cite class="author">&mdash; <span>Brandon White</span></cite></blockquote>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- END row -->
    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Mengapa Harus Memilih Pondok Pesantren Mahasiswa Syafi'ur Rohman?</h2>
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="service left-icon probootstrap-animate">
            <div class="icon"><i class="icon-checkmark"></i></div>
            <div class="text">
              <h3>Consectetur Adipisicing</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
          </div>
          <div class="service left-icon probootstrap-animate">
            <div class="icon"><i class="icon-checkmark"></i></div>
            <div class="text">
              <h3>Aliquid Dolorum Saepe</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
          </div>
          <div class="service left-icon probootstrap-animate">
            <div class="icon"><i class="icon-checkmark"></i></div>
            <div class="text">
              <h3>Eveniet Tempora Anisi</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="service left-icon probootstrap-animate">
            <div class="icon"><i class="icon-checkmark"></i></div>
            <div class="text">
              <h3>Laboriosam Quod Dignissimos</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
          </div>

          <div class="service left-icon probootstrap-animate">
            <div class="icon"><i class="icon-checkmark"></i></div>
            <div class="text">
              <h3>Asperiores Maxime Modi</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
          </div>

          <div class="service left-icon probootstrap-animate">
            <div class="icon"><i class="icon-checkmark"></i></div>
            <div class="text">
              <h3>Libero Maxime Molestiae</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
          </div>

        </div>
      </div>
      <!-- END row -->
    </div>
  </section>


@endsection
