@extends('layouts.frontend')

@section('content')

<section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
    <div class="container">
      <div class="row">
        <div class="img-article">
            <img src="{{ url('frontend/enlight-master/img/img_sm_3.jpg') }}" alt="" width="100%" height="450px">
        </div>
    </div>
    <div class="row">
          <div class="col-md-6 text-left mt-20">
            <h3>Artikel PPM Syafi'ur Rohman</h3>
          </div>

      </div>
      <!-- END row -->
      <div class="row">
        <div class="col-md-6">
          <div class="probootstrap-service-2 probootstrap-animate">
            <div class="image">
              <div class="image-bg">
                <img src="{{ url('frontend/enlight-master/img/img_sm_1.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
              </div>
            </div>
            <div class="text">
              <span class="probootstrap-meta"><i class="icon-calendar2"></i> July 10, 2017</span>
              <h3>Application Design</h3>
              <p>Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
              <p><a href="{{ url('detailartikel') }}" class="btn btn-primary">Enroll now</a> <span class="enrolled-count">2,928 students enrolled</span></p>
            </div>
          </div>

          <div class="probootstrap-service-2 probootstrap-animate">
            <div class="image">
              <div class="image-bg">
                <img src="{{ url('frontend/enlight-master/img/img_sm_3.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
              </div>
            </div>
            <div class="text">
              <span class="probootstrap-meta"><i class="icon-calendar2"></i> July 10, 2017</span>
              <h3>Chemical Engineering</h3>
              <p>Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
              <p><a href="{{ url('detailartikel') }}" class="btn btn-primary">Enroll now</a> <span class="enrolled-count">7,202 students enrolled</span></p>
            </div>
          </div>

        </div>
        <div class="col-md-6">
          <div class="probootstrap-service-2 probootstrap-animate">
            <div class="image">
              <div class="image-bg">
                <img src="{{ url('frontend/enlight-master/img/img_sm_2.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
              </div>
            </div>
            <div class="text">
              <span class="probootstrap-meta"><i class="icon-calendar2"></i> July 10, 2017</span>
              <h3>Math Major</h3>
              <p>Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
              <p><a href="{{ url('detailartikel') }}" class="btn btn-primary">Enroll now</a> <span class="enrolled-count">12,582 students enrolled</span></p>
            </div>
          </div>

          <div class="probootstrap-service-2 probootstrap-animate">
            <div class="image">
              <div class="image-bg">
                <img src="{{ url('frontend/enlight-master/img/img_sm_4.jpg') }}" alt="Free Bootstrap Template by ProBootstrap.com">
              </div>
            </div>
            <div class="text">
              <span class="probootstrap-meta"><i class="icon-calendar2"></i> July 10, 2017</span>
              <h3>English Major</h3>
              <p>Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
              <p><a href="{{ url('detailartikel') }}" class="btn btn-primary">Enroll now</a> <span class="enrolled-count">9,582 students enrolled</span></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

@endsection
