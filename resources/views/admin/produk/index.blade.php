

<form method="post" action="{{ asset('admin/produk/proses') }}">
{{ csrf_field() }}



<div class="mailbox-controls">
<div class="table-responsive mailbox-messages">

	<div class="input-group">
	  <button type="submit" name="hapus" class="btn btn-secondary">
	  	<i class="fa fa-trash"></i>
	  </button>
	  <select name="id_kategori" class="form-control select2">

	  	<?php foreach($kategori as $kategori) { ?>
	  		<option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
	  	<?php } ?>

	  </select>
	  <span class="input-group-append">

	    <button type="submit" name="update" class="btn btn-info">
	    	<i class="fa fa-save"></i> Update
	    </button>

	    <button type="submit" name="draft" class="btn btn-secondary" title="Set sebagai draft">
	    	<i class="fa fa-eye-slash"></i>
	    </button>

	    <button type="submit" name="publish" class="btn btn-dark" title="Publikasikan">
	    	<i class="fa fa-eye"></i>
	    </button>

	    <a href="{{ asset('admin/produk/unduh') }}" class="btn btn-danger" target="_blank">
			<i class="fa fa-file-pdf"></i> Unduh Pricelist
		</a>

	    <a href="{{ asset('admin/produk/tambah') }}" class="btn btn-success">
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
			<th width="10%">Gambar</th>
			<th>Produk</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($produk as $produk) { ?>
		<tr>
			<td class="text-center">
				<div class="icheck-primary">
	               <input type="checkbox" name="id_produk[]" value="{{ $produk->id_produk }}" id="check{{ $i }}">
	               <label for="check{{ $i }}"></label>
	            </div>
			</td>
			<td>
				<?php if($produk->gambar =='') { echo '-'; }else{ ?>
					<img src="{{ asset('assets/upload/image/'.$produk->gambar) }}" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td>{{ $produk->nama_produk }}</td>
			<td><a href="{{ asset('admin/produk/kategori/'.$produk->id_kategori) }}">{{ $produk->nama_kategori }}</a></td>
			<td>{{ $produk->harga }}</td>
			<td class="text-center">
				<a href="{{ asset('admin/produk/status-produk/'.$produk->status_produk) }}">
					<?php if($produk->status_produk=='Draft') { ?>
						<span class="badge badge-secondary"><i class="fa fa-eye-slash"></i> 
							{{ $produk->status_produk }}
						</span>
					<?php }else{ ?>
						<span class="badge badge-dark"><i class="fa fa-eye"></i> 
							{{ $produk->status_produk }}
						</span>
					<?php } ?>
				</a>
			</td>
			<td>
				<a href="{{ asset('produk/'.$produk->slug_produk) }}" class="btn btn-success btn-sm mb-1" target="_blank">
					<i class="fa fa-eye"></i>
				</a>

				<a href="{{ asset('admin/produk/cetak/'.$produk->id_produk) }}" class="btn btn-danger btn-sm mb-1" target="_blank">
					<i class="fa fa-file-pdf"></i>
				</a>

				<a href="{{ asset('admin/produk/edit/'.$produk->id_produk) }}" class="btn btn-warning btn-sm mb-1">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ asset('admin/produk/delete/'.$produk->id_produk) }}" class="btn btn-secondary btn-sm delete-link mb-1">
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