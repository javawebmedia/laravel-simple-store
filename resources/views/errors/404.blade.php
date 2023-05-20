@include('layout/head-404')
@include('layout/header')
<!-- konten not found -->
<!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center pt-5 pt-lg-0 order-2 order-lg-1 ">
          <div data-aos="zoom-out">
            <h1>Halaman Tidak Ditemukan</h1>
            
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
    <!-- ======= About Section ======= -->
    <section id="about" class="about pb-5">
      <div class="container">

        <div class="row" >
          <!-- gambar -->
          <div class="col-md-8 offset-2">

            <div class="card">
              <div class="card-header">Mohon maaf</div>
              <div class="card-body">

                <p>Halaman yang Anda akses tidak ditemukan</p>

              </div>
            </div>

          </div>
          <!-- end gambar -->
          
        </div>

      </div>
    </section><!-- End About Section -->
  </main>

  
<!-- end konten not found -->
@include('layout/footer')