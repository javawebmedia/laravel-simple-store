<?php 
use App\Models\Produk_model;
$m_produk     = new Produk_model();
$nav_produk   = $m_produk->nav_produk('Publish');
?>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{ asset('/') }}"><span>TubagusApps</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ asset('/') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ asset('about') }}">About</a></li>
          <li><a class="nav-link scrollto" href="{{ asset('features') }}">Features</a></li>
          <li><a class="nav-link scrollto" href="{{ asset('gallery') }}">Gallery</a></li>
          <li><a class="nav-link scrollto" href="{{ asset('team') }}">Team</a></li>
          <li><a class="nav-link scrollto" href="{{ asset('pricing') }}">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach($nav_produk as $nav_produk) { ?>
              <li><a href="{{ asset('produk/kategori/'.$nav_produk->slug_kategori) }}">
                {{ $nav_produk->nama_kategori }}
              </a></li>
              <?php } ?>
              <li><a href="{{ asset('produk') }}">All Products</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ asset('kontak') }}">Contact</a></li>

          <li><a class="nav-link scrollto" href="{{ asset('keranjang') }}">
                <i class="fa fa-shopping-cart"></i>
                <sup class="badge badge-warning text-warning">{{ Cart::getTotalQuantity()}}</sup>
              </a>
            </li>

          <!-- jika client sudah login  via checkout atau form login tampilkan data login-->
          <?php if(Session()->get('username_client') !='') { ?>
            <li><a class="nav-link scrollto text-warning" href="{{ asset('dasbor') }}">
                <i class="fa fa-user"></i>&nbsp;{{ Session()->get('nama_client') }}
              </a>
            </li>
            <li><a class="nav-link scrollto text-warning" href="{{ asset('signin/logout') }}">
                <i class="fa fa-sign-out-alt"></i>
              </a>
            </li>
          <?php } ?>
          <!-- end checking -->
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->