<?php 
use App\Models\Header_transaksi_model;
$m_notifikasi   = new Header_transaksi_model();
$notifikasi     = $m_notifikasi->notifikasi();
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('assets/admin') }}/index3.html" class="brand-link">
      <img src="{{ asset('assets/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TubagusApps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ asset('admin/akun') }}" class="d-block">
            <?php echo Session()->get('nama') ?> (<?php echo Session()->get('akses_level') ?>)
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- dasbor -->
          <li class="nav-item">
            <a href="{{ asset('admin/dasbor') }}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- transaksi -->
          <li class="nav-item">
            <a href="{{ asset('admin/transaksi') }}" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Transaksi
                <span class="right badge badge-danger"><?php echo $notifikasi->total ?></span>
              </p>
            </a>
          </li>

          <!-- menu produk -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('admin/produk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/produk/tambah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/kategori') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- menu master -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('admin/client') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/merek') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Merek</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/provinsi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/kabupaten') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kabupaten</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- user/administrator -->
          <li class="nav-item">
            <a href="{{ asset('admin/user') }}" class="nav-link">
              <i class="nav-icon fa fa-user-lock"></i>
              <p>
                Pengguna Sistem
              </p>
            </a>
          </li>

          <!-- MENU -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Konfigurasi
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi') }}" class="nav-link"><i class="fas fa-tools nav-icon"></i><p>Konfigurasi Umum</p></a>
              </li>
            
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/logo') }}" class="nav-link"><i class="fa fa-home nav-icon"></i><p>Ganti Logo</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/icon') }}" class="nav-link"><i class="fa fa-upload nav-icon"></i><p>Ganti Icon</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/email') }}" class="nav-link"><i class="fa fa-envelope nav-icon"></i><p>Email Setting</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/rekening') }}" class="nav-link"><i class="fas fa-book nav-icon"></i><p>Rekening</p></a>
              </li>
            </ul>
          </li>

          <!-- logout -->
          <li class="nav-item">
            <a href="{{ asset('login/logout') }}" class="nav-link text-warning">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body" style="min-height: 400px;">

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

