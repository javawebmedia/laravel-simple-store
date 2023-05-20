<p class="text-right">
	<a href="{{ asset('admin/merek') }}" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>

<form action="{{ asset('admin/merek/proses-edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	{{ csrf_field() }}

	<input type="hidden" name="id_merek" value="{{ $merek->id_merek }}">

	<div class="form-group row">
		<label class="col-md-3">Nama</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="nama_merek" value="{{ $merek->nama_merek }}" placeholder="Nama" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Keterangan</label>
		<div class="col-md-9">
			<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ $merek->keterangan }}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Urutan</label>
		<div class="col-md-9">
			<input type="number" class="form-control" name="urutan" value="{{ $merek->urutan }}" placeholder="Urutan" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Gambar/logo</label>
		<div class="col-md-8">
			<input type="file" class="form-control" name="gambar" value="{{ $merek->gambar }}" placeholder="Gambar/Logo">
		</div>
		<div class="col-md-1">
			<?php if($merek->gambar =='') { echo '-'; }else{ ?>
					<img src="{{ asset('assets/upload/image/'.$merek->gambar) }}" class="img img-thumbnail">
				<?php } ?>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="{{ asset('admin/merek') }}" class="btn btn-outline-info">
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