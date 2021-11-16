<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    @yield('title')
    {{ $general->title }}</title>
  <meta content="{{ $general->meta_desc }}" name="description">
  <meta content="{{ $general->keyword }}" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('storage/'.$general->favicon) }}" rel="icon">
  <link href="{{ asset('storage/'.$general->favicon) }}" rel="apple-touch-icon">

  @yield('meta')
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
  
  {{-- Sharethis --}}
  {!! $general->sharethis !!}

  <!-- =======================================================
  * Template Name: Company - v2.1.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo mr-auto"><img src="{{ asset('storage/'.$general->logo) }}" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li {{ request()->is('/') ? 'class=active' : '' }}><a href="{{ route('homepage') }}">{{ __('header.home') }}</a></li>

          <li class="drop-down"><a href="">{{ __('header.about') }}</a>
            <ul>
              <li {{ request()->is('about-us') ? 'class=active' : '' }}><a href="{{ route('about') }}">{{ __('header.about') }}</a></li>
              <li {{ request()->is('testimonials') ? 'class=active' : '' }}><a href="{{ route('testi') }}">{{ __('header.testimonials') }}</a></li>
            </ul>
          </li>

          <li {{ request()->is('services') ? 'class=active' : '' }}><a href="{{ route('service') }}">{{ __('header.services') }}</a></li>
          <li {{ request()->is('portfolio') ? 'class=active' : '' }}><a href="{{ route('portfolio') }}">{{ __('header.portfolio') }}</a></li>
          <li {{ request()->is('blog') ? 'class=active' : '' }}><a href="{{ route('blog') }}">{{ __('header.blog') }}</a></li>
      
        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="{{ $general->twitter }}" target="_blank" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="{{ $general->facebook }}" target="_blank" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="{{ $general->instagram }}" target="_blank" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="{{ $general->linkedin }}" target="_blank" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Company</h3>
            <p>
              {{ $general->address1 }} <br>
              {{ $general->address2 }}<br>
              <a href="{{ $general->gmaps }}" target="_blank" rel="noopener noreferrer">(Go to gmaps)</a>
              <br><br>
              
              <strong>Phone:</strong> {{ $general->phone }}<br>
              <strong>Email:</strong> {{ $general->email }}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              @foreach ($link as $link)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ $link->link }}">{{ $link->name }}</a></li>
              @endforeach
            
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Latest Posts</h4>
            <ul>
              @foreach ($lpost as $lpost)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blogshow',$lpost->slug) }}">{{ $lpost->title }}</a></li>
              @endforeach
             
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to the latest article updates via email</p>
            @if (session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

            @endif

            <form action="{{ route('subscribe') }}" method="post">
              @csrf
              <input type="email" name="email" class="form-control {{$errors->first('email') ? "is-invalid" : "" }} " value="{{old('email')}}" required><input type="submit" value="Subscribe">
              <div class="invalid-feedback">
                {{ $errors->first('email') }}    
            </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>{{ $general->footer }}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://yes-soft.de/">YES SOFT TEAM</a> ・ Developed by <a href="https://yes-soft.de/">YES SOFT</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{ $general->twitter }}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ $general->facebook }}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ $general->instagram }}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ $general->linkedin }}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('front/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('front/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('front/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('front/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('front/js/main.js') }}"></script>

  {!! $general->tawkto !!}

  @stack('scripts')

</body>

</html>
