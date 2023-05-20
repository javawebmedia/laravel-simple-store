<p class="text-right">
	<a href="{{ asset('admin/produk') }}" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>

<form action="{{ asset('admin/produk/proses-edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	{{ csrf_field() }}

	<input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">

	<div class="form-group row">
		<label class="col-md-3">Nama Produk</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}" placeholder="Nama" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Kode, Status, dan Jenis</label>
		<div class="col-md-3">
			<input type="text" class="form-control" name="kode_produk" value="{{ $produk->kode_produk }}" placeholder="Kode Produk" required>
		</div>
		<div class="col-md-3">
			<select name="status_produk" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if($produk->status_produk=="Draft") { echo 'selected'; } ?>>Draft</option>
			</select>
		</div>
		<div class="col-md-3">
			<select name="jenis_produk" class="form-control">
				<option value="Fisik">Fisik</option>
				<option value="Digital" <?php if($produk->jenis_produk=="Digital") { echo 'selected'; } ?>>Digital</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Kategori dan Merek</label>
		<div class="col-md-3">
			<select name="id_kategori" class="form-control select2" required>
				<option value="">Pilih Kategori</option>
				<?php foreach($kategori as $kategori) { ?>
					<option value="<?php echo $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori) { echo 'selected'; } ?>>
						<?php echo $kategori->nama_kategori ?>
					</option>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-3">
			<select name="id_merek" class="form-control select2" required>
				<option value="">Pilih Merek</option>
				<?php foreach($merek as $merek) { ?>
					<option value="<?php echo $merek->id_merek ?>" <?php if($produk->id_merek==$merek->id_merek) { echo 'selected'; } ?>>
						<?php echo $merek->nama_merek ?>
					</option>
				<?php } ?>
			</select>
		</div>
	</div>


	<div class="form-group row">
		<label class="col-md-3">Harga</label>
		<div class="col-md-3">
			<input type="number" class="form-control" name="harga" value="{{ $produk->harga }}" placeholder="Harga" required>
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="harga_diskon" value="{{ $produk->harga_diskon }}" placeholder="Harga diskon" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Periode Diskon</label>
		<div class="col-md-3">
			<input type="text" class="form-control tanggal" name="tanggal_mulai" value="{{ date('d-m-Y',strtotime($produk->tanggal_mulai)) }}" placeholder="dd-mm-yyyy" required>
		</div>
		<div class="col-md-3">
			<input type="text" class="form-control tanggal" name="tanggal_selesai" value="{{ date('d-m-Y',strtotime($produk->tanggal_selesai)) }}" placeholder="dd-mm-yyyy" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Deskripsi Ringkas</label>
		<div class="col-md-9">
			<textarea name="deskripsi" class="form-control" placeholder="Keterangan">{{ $produk->deskripsi }}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Keterangan Lengkap</label>
		<div class="col-md-9">
			<textarea name="isi" class="form-control konten" placeholder="Keterangan Lengkap"><?php echo $produk->isi ?></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Keywords</label>
		<div class="col-md-9">
			<textarea name="keywords" class="form-control" placeholder="Keywords">{{ $produk->keywords }}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Urutan</label>
		<div class="col-md-9">
			<input type="number" class="form-control" name="urutan" value="{{ $produk->urutan }}" placeholder="Urutan" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Gambar/logo</label>
		<div class="col-md-9">
			<input type="file" class="form-control" name="gambar" value="{{ $produk->gambar }}" placeholder="Gambar/Logo">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="{{ asset('admin/produk') }}" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i>
			</a>
			<button class="btn btn-secondary" type="reset">
				<i class="fa fa-times"></i> Reset
			</button>
			<button class="btn btn-success" type="submit">
				<i class="fa fa-save"></i> Simpan
			</button>
		</div>
	</div>

</form>