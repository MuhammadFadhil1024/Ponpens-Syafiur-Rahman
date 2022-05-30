@extends('layouts.frontend')

@section('content')

<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left section-heading probootstrap-animate">
          <h1>Event PPM Syafi'ur Rohman</h1>
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
              <div class="text-uppercase probootstrap-uppercase">Featured Events</div>
              <h3>#NGONTEN02 NGOBROL INTENS</h3>
              <p>PPM SYAFI'UR ROHMAN mempersembahkan #NGONTEN atau Ngobrol Intens.</p>
              <p>
                <span class="probootstrap-date"><i class="icon-calendar"></i>April 30, 2022</span>
                <span class="probootstrap-location"><i class="icon-location2"></i>PPM Syafi'ur Rohman, Jember</span>
              </p>
              <p><a href="#" class="btn btn-primary">Learn More</a></p>
            </div>
            <div class="probootstrap-image probootstrap-animate" style="background-image: url(img/slider_4.jpg)">
                <iframe src="https://www.youtube.com/embed/jU5E8IybyRs" frameborder="0" class="btn-video popup-vimeo"><i class="icon-play3"></i></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section class="probootstrap-section">
    <div class="container">

      <div class="row">
        @foreach ($events as $item)
          <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
            <a href="{{ url('detailevent', $item->slug) }}" class="probootstrap-featured-news-box">
              <figure class="probootstrap-media"><img src="{{$item->eventgallery()->exists() ? Storage::url($item->eventgallery->first()->url) : "data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="}}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-index"></figure>
              <div class="probootstrap-text">
                <h3>{{$item->name}}</h3>
                <span class="probootstrap-date"><i class="icon-calendar"></i>{{$item->date}}</span>
                <span class="probootstrap-location"><i class="icon-location2"></i>{{$item->location}}</span>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
