<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simple Task Management and Submission System</title>

  <link href="{{ asset('frontend/assets') }}/img/favicon.png" rel="icon">
  <link href="{{ asset('frontend/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{ asset('frontend/assets') }}/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ route('home') }}">Simple Task Management and Submission System</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
          <li><a class="nav-link" href="{{ route('signup') }}">Sign Up</a></li>
          @auth
          <li><a class="nav-link" href="{{ isset(auth()->user()->role) && auth()->user()->role == 1 ? route('manager.dashboard') : route('teammate.dashboard') }}">Dashboard</a></li>
          @else
          <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Simple Task Management and Submission System</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/assets') }}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('frontend/assets') }}/vendor/aos/aos.js"></script>
  <script src="{{ asset('frontend/assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('frontend/assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('frontend/assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('frontend/assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('frontend/assets') }}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/assets') }}/js/main.js"></script>

</body>

</html>