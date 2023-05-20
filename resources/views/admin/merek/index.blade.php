

<form method="post" action="{{ asset('admin/merek/proses') }}">
{{ csrf_field() }}



<div class="mailbox-controls">
<div class="table-responsive mailbox-messages">

	<div class="input-group">
	  <button type="submit" name="hapus" class="btn btn-secondary">
	  	<i class="fa fa-trash"></i>
	  </button>
	  <select name="akses_level" class="form-control">
	  	<option value="Admin">Admin</option>
	  	<option value="Merek">Merek</option>
	  	<option value="Staff">Staff</option>
	  </select>
	  <span class="input-group-append">
	    <button type="submit" name="update" class="btn btn-info">Update</button>
	    <a href="{{ asset('admin/merek/tambah') }}" class="btn btn-success">
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
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($merek as $merek) { ?>
		<tr>
			<td class="text-center">
				<div class="icheck-primary">
	               <input type="checkbox" name="id_merek[]" value="{{ $merek->id_merek }}" id="check{{ $i }}">
	               <label for="check{{ $i }}"></label>
	            </div>
			</td>
			<td>
				<?php if($merek->gambar =='') { echo '-'; }else{ ?>
					<img src="{{ asset('assets/upload/image/'.$merek->gambar) }}" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td>{{ $merek->nama_merek }}</td>
			<td>{{ $merek->keterangan }}</td>
			<td>{{ $merek->urutan }}</td>
			<td>
				<a href="{{ asset('admin/merek/edit/'.$merek->id_merek) }}" class="btn btn-warning btn-sm">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ asset('admin/merek/delete/'.$merek->id_merek) }}" class="btn btn-secondary btn-sm delete-link">
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