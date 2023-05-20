@include('dasbor/menu')

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

<form action="{{ asset('dasbor/proses-konfirmasi') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}

<div class="form-group row mb-2">
  <label class="col-md-3">Pilih transaksi</label>

  <div class="col-md-9">
    <select name="id_header_transaksi" class="form-control" required>
      <option value="">Pilih transaksi....</option>
      <?php foreach($header_transaksi as $header_transaksi) { ?>
        <option value="<?php echo $header_transaksi->id_header_transaksi ?>">
          <?php echo date('d-m-Y H:i:s',strtotime($header_transaksi->tanggal_transaksi)) ?> (<?php echo $header_transaksi->kode_transaksi ?> - Rp <?php echo number_format($header_transaksi->jumlah_transaksi) ?>)
        </option>
      <?php } ?>
    </select>
  </div>

</div>

<div class="form-group row mb-2">
  <label class="col-md-3">Jumlah Bayar</label>
  <div class="col-md-9">
    <input type="number" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" class="form-control" required>
  </div>
</div>

<div class="form-group row mb-2">
  <label class="col-md-3">Tanggal Bayar</label>
  <div class="col-md-9">
    <input type="date" name="tanggal_bayar" value="{{ old('jumlah_bayar') }}" class="form-control" required>
  </div>
</div>

<div class="form-group row mb-2">
  <label class="col-md-3">Bukti Bayar</label>
  <div class="col-md-9">
    <input type="file" name="bukti_bayar" value="{{ old('bukti_bayar') }}" class="form-control" required>
  </div>
</div>

<div class="form-group row mb-3">
  <label class="col-md-3"></label>
  <div class="col-md-9">
    <button class="btn btn-success" type="submit">
      <i class="fa fa-save"></i> Simpan Konfirmasi
    </button>
  </div>
</div>

</form>

@include('dasbor/footer')
            