
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/admin/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/')}}/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="{{ asset('assets/admin/')}}/plugins/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('assets/admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ asset('/') }}" class="h1"><b>TUBAGUS</b>APPS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukkan username dan password</p>

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

      <form action="{{ asset('login/proses-login') }}" method="post">
      {{ csrf_field() }}

        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <hr>

      <p class="mb-1 text-center">
        <a href="{{ asset('/') }}">Home</a> | <a href="{{ asset('login/lupa') }}">Lupa Password?</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/')}}/dist/js/adminlte.min.js"></script>
<!-- sweetalert -->
<script>
  // Popup Delete
  $(document).on("click", ".delete-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    Swal.fire({
        title: 'Anda yakin?',
        text: "Jika dihapus, data tidak dapat dikembalikan lagi!",
        icon: 'warning',
        timer: 3000,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
              url: url,
              success: function(resp){
                window.location.href = url;
              }
            });
        }
      })
  });

 // Popup Delete
$(document).on("click", ".disable-link", function(e){
  e.preventDefault();
  url = $(this).attr("href");
  Swal.fire({
    title:"Yakin akan mengupdate data ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: 'btn btn-danger',
    cancelButtonClass: 'btn btn-success',
    buttonsStyling: false,
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  },
  function(isConfirm){
    if(isConfirm){
      $.ajax({
        url: url,
        success: function(resp){
          window.location.href = url;
        }
      });
    }
    return false;
  });
});


  @if ($message = Session::get('sukses'))
    Swal.fire({
      icon: 'success',
      heightAuto: false,
      timer: 2000,
      title: 'Sukses...',
      text: 'Anda berhasil logout.',
    })
  @endif
  @if ($message = Session::get('warning'))
  // Notifikasi
  Swal.fire({
    icon: 'warning',
    title: 'Oops...',
    timer: 3000,
    heightAuto: false,
    text: '<?php echo $message ?>',
  })
  @endif
  @if ($message = Session::get('sukses'))
  // Notifikasi
  Swal.fire({
    icon: 'success',
    heightAuto: false,
    timer: 1000,
    title: 'Sukses...',
    text: '<?php echo $message ?>',
  })
   @endif
  </script>
</body>
</html>
