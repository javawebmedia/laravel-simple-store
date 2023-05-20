<p class="text-right">
	<a href="{{ asset('admin/user') }}" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>

<form action="{{ asset('admin/user/proses-edit') }}" method="post" accept-charset="utf-8">
	{{ csrf_field() }}

	<input type="hidden" name="id_user" value="{{ $user->id_user }}">

	<div class="form-group row">
		<label class="col-md-3">Nama</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="nama" value="{{ $user->nama }}" placeholder="Nama" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Email</label>
		<div class="col-md-9">
			<input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Username</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" readonly>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Password</label>
		<div class="col-md-9">
			<input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
			<small class="text-danger">Minimal 6 dan maksimal 32 karakter. Biarkan kosong jika tidak ingin mengganti password</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Level Hak Akses</label>
		<div class="col-md-9">
			<select name="akses_level" class="form-control">
				<option value="Admin">Admin</option>
				<option value="User" <?php if($user->akses_level=='User') { echo 'selected'; } ?>>User</option>
				<option value="Staff" <?php if($user->akses_level=='Staff') { echo 'selected'; } ?>>Staff</option>
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