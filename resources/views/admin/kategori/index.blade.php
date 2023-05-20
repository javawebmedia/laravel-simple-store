

<form method="post" action="{{ asset('admin/kategori/proses') }}">
{{ csrf_field() }}



<div class="mailbox-controls">
<div class="table-responsive mailbox-messages">

	<div class="input-group">
	  <button type="submit" name="hapus" class="btn btn-secondary">
	  	<i class="fa fa-trash"></i>
	  </button>
	  <select name="status_kategori" class="form-control">
	  	<option value="Publish">Publish</option>
		<option value="Draft">Draft</option>
	  </select>
	  <span class="input-group-append">
	    <button type="submit" name="update" class="btn btn-info">Update</button>
	    <a href="{{ asset('admin/kategori/tambah') }}" class="btn btn-success">
			<i class="fa fa-plus-circle"></i> Tambah Baru
		</a>
	  </span>
	</div>

	<br>

<table class="table table-bordered table-sm" id="example1">
	<thead>
		<tr>
			<th width="5%">
				<!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
			</th>
			<th width="10%">Logo</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th>Urutan</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($kategori as $kategori) { ?>
		<tr>
			<td class="text-center">
				<div class="icheck-primary">
	               <input type="checkbox" name="id_kategori[]" value="{{ $kategori->id_kategori }}" id="check{{ $i }}">
	               <label for="check{{ $i }}"></label>
	            </div>
			</td>
			<td>
				<?php if($kategori->gambar =='') { echo '-'; }else{ ?>
					<img src="{{ asset('assets/upload/image/'.$kategori->gambar) }}" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td>{{ $kategori->nama_kategori }}</td>
			<td>{{ $kategori->keterangan }}</td>
			<td>{{ $kategori->urutan }}</td>
			<td>{{ $kategori->status_kategori }}</td>
			<td>
				<a href="{{ asset('admin/kategori/edit/'.$kategori->id_kategori) }}" class="btn btn-warning btn-sm">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ asset('admin/kategori/delete/'.$kategori->id_kategori) }}" class="btn btn-secondary btn-sm delete-link">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>
</div>

</form>