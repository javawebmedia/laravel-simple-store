<p class="text-right">
  <a href="{{ asset('admin/transaksi/cetak/'.$header_transaksi->id_header_transaksi) }}" class="btn btn-outline-danger" target="_blank">
    <i class="fa fa-file-pdf"></i> Cetak/Unduh
  </a>
  <a href="{{ asset('admin/transaksi/edit/'.$header_transaksi->id_header_transaksi) }}" class="btn btn-outline-success">
    <i class="fa fa-edit"></i> Edit
  </a>
  <a href="{{ asset('admin/transaksi') }}" class="btn btn-outline-info">
    <i class="fa fa-arrow-left"></i> Kembali
  </a>
</p>

<table class="table table-bordered table-sm">
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
<table class="table table-bordered mt-3 table-sm">
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