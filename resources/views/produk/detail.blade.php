<!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center pt-5 pt-lg-0 order-2 order-lg-1 ">
          <div data-aos="zoom-out">
            <h1>{{ $title }}</h1>
            
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
    <section id="about" class="about">
      <div class="container">

        <div class="row" >
          <!-- gambar -->
          <div class="col-md-6">
            <div class="row p-2">

            </div>
          </div>
          <!-- end gambar -->
          <!-- deskripsi -->
          <div class="col-md-6 mb-5">
            <div class="row p-2">

              <h2><?php echo $title ?></h2>
              <hr>
              <h3 class="text-danger">Rp <?php echo number_format($produk->harga,'0',',','.') ?></h3>
              <p>
                <?php echo $produk->deskripsi ?>
              </p>
              <form action="{{ asset('produk/add') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="mb-5">
                {{ csrf_field() }}

                <input type="hidden" name="pengalihan" value="{{ url()->current() }}">

                <input type="hidden" name="id" value="<?php echo $produk->id_produk ?>">
                <input type="hidden" name="name" value="<?php echo $produk->nama_produk ?>">
                <input type="hidden" name="price" value="<?php echo $produk->harga ?>">
                <input type="hidden" name="image" value="<?php echo $produk->gambar ?>">

                <div class="input-group">
                  <input type="number" class="form-control" name="quantity" min="1" value="1">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                  </span>
                </div>

              </form>
              <hr>
              <h3>Detail produk</h3>
              <?php echo $produk->isi ?>

            </div>
          </div>
          <!-- end deskripsi -->
        </div>

      </div>
    </section><!-- End About Section -->
  </main>

  