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

          <table class="table table-bordered table-sm">
            <thead>
              <tr class="bg-light">
                <th colspan="2" width="30%">Produk</th>
                <th width="15%">Harga</th>
                <th width="20%">Quantity</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($keranjang as $keranjang) { 
                $subtotal = $keranjang->price * $keranjang->quantity;
                ?>
              <tr>
                <td width="10%"><img src="{{ asset('assets/upload/image/'.$keranjang['attributes']['image']) }}" class="img img-thumbnail"></td>
                <td>{{ $keranjang->name }}</td>
                <td class="text-right">{{ number_format($keranjang->price,'0',',','.') }}</td>
                <td class="text-center">
                    
                    <form action="{{ asset('keranjang/update') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="mb-5">
                      {{ csrf_field() }}
                      <input type="hidden" name="pengalihan" value="{{ url()->current() }}">
                      <input type="hidden" name="id" value="<?php echo $keranjang->id ?>">

                      <div class="input-group">
                        <input type="number" class="form-control" name="quantity" min="1" value="{{ $keranjang->quantity }}">
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-success btn-flat">Update</button>
                        </span>
                      </div>
                    </form>

                </td>
                <td class="text-right">{{ number_format($subtotal,'0',',','.') }}</td>
              </tr>
            <?php } ?>
            <tr class="bg-light">
              <td colspan="3">Jumlah total</td>
              <td class="text-center">{{ number_format(Cart::getTotalQuantity(),'0',',','.') }}</td>
              <td class="text-right">{{ number_format(Cart::getTotal(),'0',',','.') }}</td>
            </tr>
            <tr class="bg-light">
              <td colspan="3"></td>
              <td class="text-center">
                <a href="{{ asset('keranjang/kosongkan') }}" class="btn btn-secondary">
                  <i class="fa fa-trash"></i> Kosongkan Keranjang
                </a>
              </td>
              <td class="text-right">
                <a href="{{ asset('keranjang/checkout') }}" class="btn btn-success">
                   Checkout <i class="fa fa-arrow-right"></i>
                </a>
              </td>
            </tr>
            </tbody>
          </table>

        </div>

      </div>
    </section><!-- End Features Section -->
  </main>