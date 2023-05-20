<!-- tinymce -->
<script>
  // advance version full features
tinymce.init({
  selector: '.konten',
  menubar: true,
  relative_urls : false,
  remove_script_host : false,
  convert_urls : true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | link | image | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

// simple version
tinymce.init({
  selector: '.simpleForm',
  menubar: false,
  toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

// DATEPICKER
  $( function() {
    $( ".tanggal" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy",
    });
  } );
</script>


</div>
        <!-- /.card-body -->
        <div class="card-footer">
          Developed by Tubagus | Framework Version v{{ Illuminate\Foundation\Application::VERSION }}
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin') }}/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Page specific script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>

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