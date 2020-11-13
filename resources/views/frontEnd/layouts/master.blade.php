
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sailor Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/') }}frontEnd/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('/') }}frontEnd/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/') }}frontEnd/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}frontEnd/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}frontEnd/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}frontEnd/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}frontEnd/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/') }}frontEnd/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('/') }}frontEnd/assets/vendor/owl.carousel/{{ asset('/') }}frontEnd/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/') }}frontEnd/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v2.2.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @include('frontEnd.partials.header')
  
  @yield('content')

 

 
  @include('frontEnd.partials.footer')


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/') }}frontEnd/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ asset('/') }}frontEnd/assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/') }}frontEnd/assets/js/main.js"></script>

</body>

</html>