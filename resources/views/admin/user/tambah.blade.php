<p class="text-right">
	<a href="{{ asset('admin/user') }}" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>

<form action="{{ asset('admin/user/proses-tambah') }}" method="post" accept-charset="utf-8">
	{{ csrf_field() }}

	<div class="form-group row">
		<label class="col-md-3">Nama</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Email</label>
		<div class="col-md-9">
			<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Username</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Password</label>
		<div class="col-md-9">
			<input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Level Hak Akses</label>
		<div class="col-md-9">
			<select name="akses_level" class="form-control">
				<option value="Admin">Admin</option>
				<option value="User">User</option>
				<option value="Staff">Staff</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="{{ asset('admin/user') }}" class="btn btn-outline-info">
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