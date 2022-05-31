<div class="probootstrap-header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
          <span><i class="icon-location2"></i>Jl. Brantas No.25, Krajan Timur, Sumbersari, Jember</span>
          <span><i class="icon-phone2"></i>+62 823-3835-0709</span>
          <span><i class="icon-mail"></i>ppmsrjember@gmail.com</span>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
          <ul>
            <li><a href="#"><i class="icon-whatsapp"></i></a></li>
            <li><a href="https://www.facebook.com/ppmsrjember"><i class="icon-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/ppmsr_jember"><i class="icon-instagram"></i></a></li>
            <li><a href="https://twitter.com/ppmsr_jember"><i class="icon-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/c/PPMSyafiurRohmanJember354"><i class="icon-youtube"></i></a></li>
            {{-- <li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i class="icon-search"></i></a></li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default probootstrap-navbar">
    <div class="container">
      <div class="navbar-header">
        <div class="btn-more js-btn-more visible-xs">
          <a href="#"><i class="icon-dots-three-vertical "></i></a>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}" title="ProBootstrap:Enlight">PPM Syafi'ur Rohman</a>
      </div>



      <div id="navbar-collapse" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
          <li class="{{ request()->is('profil') ? 'active' : '' }}"><a href="{{ url('profil') }}">Profil</a></li>
          <li class="{{ request()->is('divisi') ? 'active' : '' }}"><a href="{{ url('divisi') }}">Divisi</a></li>
          <li class="{{ request()->is('artikel') ? 'active' : '' }}"><a href="{{ url('artikel') }}">Artikel</a></li>
          <li class="{{ request()->is('fasilitas') ? 'active' : '' }}"><a href="{{ url('fasilitas') }}">Fasilitas</a></li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle ">Event</a>
            <ul class="dropdown-menu">
              @php($link = App\Models\Event::all())
              @php($uniqyear = $link->unique('year'))
                @foreach ($uniqyear as $item)
                  <li ><a href="{{route('event', $item->year)}}">{{$item->year}}</a></li>
                @endforeach
            </ul>
          </li>
          <li><a href="{{route('register')}}">Register</a></li>
          <li><a href="{{route('login')}}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
