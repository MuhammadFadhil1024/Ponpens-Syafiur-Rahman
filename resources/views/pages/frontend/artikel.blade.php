@extends('layouts.frontend')

@section('content')

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
        @foreach ($articles as $article)
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
                <p>{!! Str::limit($article->content, 200) !!}</p>
                <p><a href="{{ route('detailartikel', $article->slug) }}" class="btn btn-primary">Baca</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
