@extends('layouts.frontend')

@section('content')

<section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Artikel PPM Syafi'ur Rohman</h2>
          <p class="lead">Berikut ini merupakan beberapa artikel karya santri dan santriwati PPM Syafi'ur Rohman </p>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
            <div class="item">
                <a href="{{route('detailartikel', $article->slug)}}" class="probootstrap-featured-news-box">
                    <figure class="probootstrap-media"><img src="{{ Storage::url($article->link) }}" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></figure>
                    <div class="probootstrap-text">
                    <h3>{{$article->title}}</h3>
                    <p>{!! Str::limit($article->content, 150) !!}</p>
                    <span class="probootstrap-date"><i class="icon-calendar"></i>{{$article->published}}</span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        {{-- @foreach ($articles as $article)
          <div class="col-md-6">
            <div class="probootstrap-service-2 probootstrap-animate">
              <div class="image">
                <div class="image-bg">
                  <img src="{{ Storage::url($article->link) }}">
                </div>
              </div>
              <div class="text">
                <span class="probootstrap-meta"><i class="icon-calendar2"></i> {{$article->published}}</span>
                <h3>{{$article->title}}</h3>
                <p>{!! Str::limit($article->content, 150) !!}</p>
                <p><a href="{{ route('detailartikel', $article->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        @endforeach --}}
      </div>
    </div>
  </section>

@endsection
