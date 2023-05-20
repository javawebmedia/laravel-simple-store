

<form method="post" action="{{ asset('admin/user/proses') }}">
{{ csrf_field() }}



<div class="mailbox-controls">
<div class="table-responsive mailbox-messages">

	<div class="input-group">
	  <button type="submit" name="hapus" class="btn btn-secondary">
	  	<i class="fa fa-trash"></i>
	  </button>
	  <select name="akses_level" class="form-control">
	  	<option value="Admin">Admin</option>
	  	<option value="User">User</option>
	  	<option value="Staff">Staff</option>
	  </select>
	  <span class="input-group-append">
	    <button type="submit" name="update" class="btn btn-info">Update</button>
	    <a href="{{ asset('admin/user/tambah') }}" class="btn btn-success">
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
			<th>Nama</th>
			<th>Email</th>
			<th>Username</th>
			<th>Level</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($user as $user) { ?>
		<tr>
			<td class="text-center">
				<div class="icheck-primary">
	               <input type="checkbox" name="id_user[]" value="{{ $user->id_user }}" id="check{{ $i }}">
	               <label for="check{{ $i }}"></label>
	            </div>
			</td>
			<td>{{ $user->nama }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->akses_level }}</td>
			<td>
				<a href="{{ asset('admin/user/edit/'.$user->id_user) }}" class="btn btn-warning btn-sm">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ asset('admin/user/delete/'.$user->id_user) }}" class="btn btn-secondary btn-sm delete-link">
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