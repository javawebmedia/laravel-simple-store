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
          <div class="col-md-8 offset-2">
            <!-- header -->
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td width="25%" class="bg-light">No Transaksi</td>
                  <td>{{ $header_transaksi->kode_transaksi }}</td>
                </tr>
                <tr>
                  <td class="bg-light">Tanggal Transaksi</td>
                  <td>{{ date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) }}</td>
                </tr>
                <tr>
                  <td class="bg-light">Nama customer</td>
                  <td>{{ $header_transaksi->nama_pelanggan }}</td>
                </tr>
                <tr>
                  <td class="bg-light">Email</td>
                  <td>{{ $header_transaksi->email }}</td>
                </tr>
                <tr>
                  <td class="bg-light">Telepon</td>
                  <td>{{ $header_transaksi->telepon }}</td>
                </tr>
                <tr>
                  <td class="bg-light">Alamat</td>
                  <td>{{ $header_transaksi->alamat }}</td>
                </tr>
                <tr>
                  <td class="bg-light">Total transaksi</td>
                  <td>Rp {{ number_format($header_transaksi->jumlah_transaksi) }}</td>
                </tr>
              </tbody>
            </table>
            <!-- produk -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($transaksi as $transaksi) { ?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $transaksi->nama_produk }}</td>
                  <td>{{ $transaksi->jumlah }}</td>
                  <td>{{ $transaksi->harga }}</td>
                  <td>{{ $transaksi->total_harga }}</td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
