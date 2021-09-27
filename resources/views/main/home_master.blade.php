<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Easy Online News Site</title>
  @php
  $seo = DB::table('seos')->first();
@endphp
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keyword" content="{{ $seo->meta_keyword }}">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="google-verification" content="{{ $seo->google_verification }}">
<title>{{ $seo->meta_title }}</title>
<link href="{{ asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/menu.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/assets/style.css')}}" rel="stylesheet">
</head>
<body>
  <!-- header-start -->
  @include('main.body.header')
  @yield('content')
  @include('main.body.footer')
  <!-- middle-footer-start -->
  <section class="middle-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="editor-one">
            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="editor-two">
            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="editor-three">
            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.middle-footer-close -->
  <!-- bottom-footer-start -->
  <section class="bottom-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="copyright">
            All rights reserved © 2021 ArdaGEZEK.
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="btm-foot-menu">
            <ul>
              <li><a href="#">About US</a></li>
              <li><a href="#">Contact US</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
</body>
</html>
