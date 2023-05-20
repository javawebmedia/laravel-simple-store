<?php 
$site_config = DB::table('konfigurasi')->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $title }}</title>
  <meta content="{{ $description }}" name="description">
  <meta content="{{ $keywords }}" name="keywords">
  <!-- Favicons -->
  <link href="{{ asset('assets/upload/image/'.$site_config->icon) }}" rel="icon">
  <link href="{{ asset('assets/upload/image/'.$site_config->icon) }}" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/template') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('assets/template') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets/template') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('assets/template') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('assets/template') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('assets/template') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('assets/template') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/template') }}/assets/css/style.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="{{ asset('assets/admin') }}/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('assets/admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <link href="{{ asset('assets/admin') }}/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="{{ asset('assets/admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- =======================================================
  * Template Name: Bootslander - v4.10.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <?php echo $site_config->metatext ?>
</head>

<body>