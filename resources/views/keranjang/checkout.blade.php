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
          <div class="col-md-7">

            <div class="card">
              <div class="card-header">Isi data Anda</div>
              <div class="card-body">

                <div class="alert alert-info">

                  <?php if(Session()->get('username_client') !='') { ?>

                    Halo <strong>{{ Session()->get('nama_client') }} </strong>Silakan melanjutkan transaksi.

                  <?php }else{ ?>

                    <strong>Peringatan: </strong>Sudah memiliki akun? Silakan <a href="{{ asset('signin') }}">Login di sini</a>

                  <?php } ?>

                </div>

                 <!-- error input -->
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                <form action="{{ asset('keranjang/proses-checkout') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                {{ csrf_field() }}

                <input type="hidden" name="kode_transaksi" value="{{ $kode_transaksi }}">

                <div class="form-group row mb-3">
                  <label class="col-md-3">Nama Anda</label>
                  <div class="col-md-9">
                    <?php if(Session()->get('username_client') !='') { ?>
                      <input type="text" class="form-control" name="nama" value="{{ $client->nama }}" placeholder="Nama" required>
                    <?php }else{ ?>
                      <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama" required>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label class="col-md-3">Email (Username)</label>
                  <div class="col-md-9">
                    <?php if(Session()->get('username_client') !='') { ?>
                      <input type="email" class="form-control" name="email" value="{{ $client->email }}" placeholder="Email" readonly>
                    <?php }else{ ?>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email (Username)" required>
                    <?php } ?>
                  </div>
                </div>

                <?php if(Session()->get('username_client') !='') {}else{ ?>

                  <div class="form-group row mb-3">
                    <label class="col-md-3">Password</label>
                    <div class="col-md-9">
                      <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password" required>
                    </div>
                  </div>
                  
                <?php } ?>

                <div class="form-group row mb-3">
                  <label class="col-md-3">Telepon</label>
                  <div class="col-md-9">
                    <?php if(Session()->get('username_client') !='') { ?>
                      <input type="text" class="form-control" name="telepon" value="{{ $client->telepon }}" placeholder="Telepon" required>
                    <?php }else{ ?>
                      <input type="text" class="form-control" name="telepon" value="{{ old('telepon') }}" placeholder="Telepon" required>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label class="col-md-3">Alamat</label>
                  <div class="col-md-9">
                    <?php if(Session()->get('username_client') !='') { ?>
                      <textarea name="alamat" class="form-control" placeholder="Keterangan">{{ $client->alamat }}</textarea>
                    <?php }else{ ?>
                      <textarea name="alamat" class="form-control" placeholder="Keterangan">{{ old('alamat') }}</textarea>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label class="col-md-3"></label>
                  <div class="col-md-9">
                    <a href="{{ asset('keranjangan') }}" class="btn btn-outline-info">
                      <i class="fa fa-arrow-left"></i>
                    </a>
                    <button class="btn btn-secondary" type="reset">
                      <i class="fa fa-times"></i> Reset
                    </button>
                    <button class="btn btn-success" type="submit">
                      <i class="fa fa-save"></i> Simpan dan Checkout
                    </button>
                  </div>
                </div>

              </form>

              </div>
            </div>

          </div>
          <!-- end gambar -->
          <!-- deskripsi -->
          <div class="col-md-5 mb-5">

            <div class="card">
              <div class="card-header">Transaksi</div>
              <div class="card-body">

                <table class="table table-bordered table-sm">
                  <thead>
                    <tr class="bg-light">
                      <th width="40%">Produk</th>
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
                      <td>{{ $keranjang->name }}</td>
                      <td class="text-right">{{ number_format($keranjang->price,'0',',','.') }}</td>
                      <td class="text-center">{{ $keranjang->quantity }}</td>
                      <td class="text-right">{{ number_format($subtotal,'0',',','.') }}</td>
                    </tr>
                  <?php } ?>
                  <tr class="bg-light">
                    <td colspan="2">Jumlah total</td>
                    <td class="text-center">{{ number_format(Cart::getTotalQuantity(),'0',',','.') }}</td>
                    <td class="text-right">{{ number_format(Cart::getTotal(),'0',',','.') }}</td>
                  </tr>
                  
                  </tbody>
                </table>

              </div>
            </div>

          </div>
          <!-- end deskripsi -->
        </div>

      </div>
    </section><!-- End About Section -->
  </main>

  