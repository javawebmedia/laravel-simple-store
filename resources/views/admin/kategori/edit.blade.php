<p class="text-right">
	<a href="{{ asset('admin/kategori') }}" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>

<form action="{{ asset('admin/kategori/proses-edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	{{ csrf_field() }}

	<input type="hidden" name="id_kategori" value="{{ $kategori->id_kategori }}">

	<div class="form-group row">
		<label class="col-md-3">Nama</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}" placeholder="Nama" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Status</label>
		<div class="col-md-9">
			<select name="status_kategori" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if($kategori->status_kategori=='Draft') { echo 'selected'; } ?>>Draft</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Keterangan</label>
		<div class="col-md-9">
			<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ $kategori->keterangan }}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Urutan</label>
		<div class="col-md-9">
			<input type="number" class="form-control" name="urutan" value="{{ $kategori->urutan }}" placeholder="Urutan" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Gambar/logo</label>
		<div class="col-md-8">
			<input type="file" class="form-control" name="gambar" value="{{ $kategori->gambar }}" placeholder="Gambar/Logo">
		</div>
		<div class="col-md-1">
			<?php if($kategori->gambar =='') { echo '-'; }else{ ?>
					<img src="{{ asset('assets/upload/image/'.$kategori->gambar) }}" class="img img-thumbnail">
				<?php } ?>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="{{ asset('admin/kategori') }}" class="btn btn-outline-info">
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