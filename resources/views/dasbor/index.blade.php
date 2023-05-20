@include('dasbor/menu')

<table class="table table-bordered table-sm" id="example1">
  <thead>
    <tr>
      <th width="5%">
        <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
      </th>
      <th>Kode &amp; Tgl</th>
      <th>Customer</th>
      <th>Total</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
    <tr>
      <td class="text-center">
        <div class="icheck-primary">
                 <input type="checkbox" name="id_header_transaksi[]" value="{{ $header_transaksi->id_header_transaksi }}" id="check{{ $i }}">
                 <label for="check{{ $i }}"></label>
              </div>
      </td>
      <td>
        <?php echo date('d-m-Y H:i:s',strtotime($header_transaksi->tanggal_transaksi)) ?>
        <small><br>No: <?php echo $header_transaksi->kode_transaksi ?></small>  
      </td>
      <td><?php echo $header_transaksi->nama_pelanggan ?>
        <small>
          <br>Telp: <?php echo $header_transaksi->telepon ?>
          <br>Email: <?php echo $header_transaksi->email ?>
          <br>Alamat: <?php echo $header_transaksi->alamat ?>
        </small>  
      </td>
      <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>

      <td class="text-center">
        <?php if($header_transaksi->status_bayar=='Sudah') { ?>
          <span class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> <?php echo $header_transaksi->status_bayar ?></span>
        <?php }elseif($header_transaksi->status_bayar=='Menunggu') { ?>
          <span class="btn btn-info btn-sm"><i class="fa fa-clock"></i> <?php echo $header_transaksi->status_bayar ?></span>
        <?php }elseif($header_transaksi->status_bayar=='Konfirmasi') { ?>
          <span class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> <?php echo $header_transaksi->status_bayar ?></span>
        <?php }elseif($header_transaksi->status_bayar=='Dibatalkan') { ?>
          <span class="btn btn-secondary btn-sm"><i class="fa fa-times-circle"></i> <?php echo $header_transaksi->status_bayar ?></span>
        <?php } ?>
      </td>

      <td>
        <a href="{{ asset('admin/transaksi/detail/'.$header_transaksi->id_header_transaksi) }}" class="btn btn-success btn-sm mb-1">
          <i class="fa fa-eye"></i>
        </a>
        <a href="{{ asset('admin/transaksi/cetak/'.$header_transaksi->id_header_transaksi) }}" class="btn btn-danger btn-sm mb-1" target="_blank">
          <i class="fa fa-file-pdf"></i>
        </a>
        <a href="{{ asset('admin/transaksi/edit/'.$header_transaksi->id_header_transaksi) }}" class="btn btn-info btn-sm mb-1">
          <i class="fa fa-edit"></i>
        </a>
        <a href="{{ asset('admin/transaksi/delete/'.$header_transaksi->id_header_transaksi) }}" class="btn btn-dark btn-sm mb-1 delete-link">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>

@include('dasbor/footer')
            