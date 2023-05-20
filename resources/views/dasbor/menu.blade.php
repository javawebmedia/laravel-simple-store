<!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center pt-5 pt-lg-0 order-2 order-lg-1 ">
          <div data-aos="zoom-out">
            <h3 class="text-white">{{ $title }}</h3>
            
          </div>
        </div>
        
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">

          <div class="col-lg-3" data-aos="fade-right" data-aos-delay="100">
            <!-- card -->
            <div class="card">
              <div class="card-header">Menu Client</div>
              <div class="card-body">
                <ul>
                  <li><a href="{{ asset('dasbor') }}">Dashboard</a></li>
                  <li><a href="{{ asset('dasbor/transaksi') }}">Riwayat Transaksi</a></li>
                  <li><a href="{{ asset('dasbor/konfirmasi') }}">Konfirmasi Pembayaran</a></li>
                  <li><a href="{{ asset('dasbor/profil') }}">Profil Saya</a></li>
                  <li><a href="{{ asset('signin/logout') }}">Logout</a></li>
                </ul>
              </div>
            </div>
            <!-- end card -->
          </div>

          <div class="col-lg-9 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <!-- card -->
            <div class="card">
              <div class="card-header">{{ $title }}</div>
              <div class="card-body">