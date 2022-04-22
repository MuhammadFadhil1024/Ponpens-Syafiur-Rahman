    <!DOCTYPE html>

    <!-- 
    Theme Name: Enlight
    Theme URL: https://probootstrap.com/enlight-free-education-responsive-bootstrap-website-template
    Author: ProBootstrap.com
    Author URL: https://probootstrap.com
    License: Released for free under the Creative Commons Attribution 3.0 license (probootstrap.com/license)
    -->
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PPM Syafi'ur Rohman</title>
        <meta name="description" content="Free Bootstrap Theme by ProBootstrap.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{url('frontend/css/styles-merged.css')}}">
        <link rel="stylesheet" href="{{url('frontend/css/style.min.css')}}">
        <link rel="stylesheet" href="{{url('frontend/css/custom.css')}}">

        <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="probootstrap-search" id="probootstrap-search">
        <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
        <form action="#">
            <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
        </form>
        </div>
        
        <div class="probootstrap-page-wrapper">
        <!-- Fixed navbar -->
        @include('components.frontend.header')

        @include('components.frontend.navbar')

        @yield('content')

        @include('components.frontend.footer')

        

        </div>
        <!-- END wrapper -->
        

        <script src="{{url('frontend/js/scripts.min.js')}}"></script>
        <script src="{{url('frontend/js/main.min.js')}}"></script>
        <script src="{{url('frontend/js/custom.js')}}"></script>

    </body>
    </html>