<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Bootslander</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/template') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('assets/template') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('assets/template') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/template') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('assets/template') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets/template') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/template') }}/assets/js/main.js"></script>
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