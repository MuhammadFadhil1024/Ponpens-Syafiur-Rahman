@extends('layouts.frontend')

@section('content')

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>Divisi PPM Syafi'ur Rohman</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
      <div class="row">
        @foreach ($divisions as $division)
          <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
            <a href="{{route('detaildivisi', $division->slug)}}" class="probootstrap-featured-news-box">
              <figure class="probootstrap-media"><img height="500px" src="{{$division->divisiongallery()->exists() ? Storage::url($division->divisiongallery->first()->url) : url('frontend/enlight-master/img/img_sm_1.jpg')}}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-index"></figure>
              <div class="probootstrap-text">
                <h3>{{$division->name}}</h3>
              </div>
            </a>
          </div>
        @endforeach
        <div class="clearfix visible-sm-block visible-xs-block"></div>
      </div>
    </div>
  </section>

@endsection
