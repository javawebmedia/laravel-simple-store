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
     <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">


        <div class="row" data-aos="fade-left">

          <?php foreach($produk as $produk) { ?>
            <!-- item -->
            <div class="col-md-3">
              <div class="card">
                <img class="card-img-top" src="{{ asset('assets/upload/image/thumbs/'.$produk->gambar) }}" alt="{{ $produk->nama_produk }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                  <p class="card-text">{{ $produk->deskripsi }}</p>

                  <!-- start form add to cart -->
                  <form action="{{ asset('produk/add') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="mb-5">
                  {{ csrf_field() }}

                  <input type="hidden" name="pengalihan" value="{{ url()->current() }}">

                  <input type="hidden" name="id" value="<?php echo $produk->id_produk ?>">
                  <input type="hidden" name="name" value="<?php echo $produk->nama_produk ?>">
                  <input type="hidden" name="price" value="<?php echo $produk->harga ?>">
                  <input type="hidden" name="image" value="<?php echo $produk->gambar ?>">
                  <input type="hidden" name="quantity" value="1">

                    <a href="{{ asset('produk/detail/'.$produk->slug_produk) }}" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>

                    <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i></button>

                  </form>
                  <!-- end form add to cart -->

                </div>
              </div>
            </div>
            <!-- /item -->
          <?php } ?>

        </div>

        <div class="row mt-5">
          <div class="col-md-12 text-center d-flex justify-content-center">
            {{ $produks->links() }}
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->
  </main>