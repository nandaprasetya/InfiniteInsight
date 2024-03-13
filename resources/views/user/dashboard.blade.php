<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('asset/logo-infiniteInsight.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">

    <style>
      .nav-item img{
        width: 30px;
        height: 30px;
        margin-left:10px;
        border-radius: 50%;
      }
    </style>
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white ">
    <!-- Left navbar links -->
    <ul class="container pe-3 navbar-nav d-flex justify-content-between">
      <div class="d-flex">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      </div>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->username }}
            @if(auth()->user()->foto)
              <img src="{{ asset('storage/storage/user/'.auth()->user()->foto) }}" class="rounded" alt="">
            @else
              <img src="{{ asset('asset/no-profile.png') }}" class="rounded" alt="No Profile Picture">
            @endif
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-gear"></i> Setting</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
              </button>
            </form>
            </li>
          </ul>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link d-flex">
      <img src="{{asset('asset/logo-infiniteInsight.png')}}" alt="Perpus Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light" style="line-height:1.3;">InfiniteInsight</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Book Sidebar -->
          <li class="nav-item @if($pageName === 'BookPage') menu-open @endif">
            <a href="#" class="nav-link @if($pageName === 'BookPage') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('buku.index')}}" class="nav-link">
                  <i class="fa-regular fa-folder-open nav-icon"></i>
                  <p>Dashboard Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('buku.create')}}" class="nav-link">
                  <i class="fa-regular fa-square-plus nav-icon"></i>
                  <p>Tambah Buku</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Komentar Sidebar -->
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link ">
              <i class="nav-icon far fa-comments"></i>
              <p>
                Komentar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa-regular fa-folder-open nav-icon"></i>
                  <p>Dashboard Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa-regular fa-square-plus nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Kategori Buku Sidebar -->
          <li class="nav-item @if($pageName === 'KategoriPage') menu-open @endif">
            <a href="#" class="nav-link @if($pageName === 'KategoriPage') active @endif">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Kategori Buku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('kategori.index')}}" class="nav-link">
                  <i class="fa-regular fa-folder-open nav-icon"></i>
                  <p>Dashboard Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kategori.create')}}" class="nav-link">
                  <i class="fa-regular fa-square-plus nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Sidebar Peminjaman -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Peminjaman  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('search')}}" class="nav-link">
                  <i class="fa-regular fa-folder-open nav-icon"></i>
                  <p>Dashboard Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="fa-regular fa-square-plus nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Sidebar User -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="fa-regular fa-folder-open nav-icon"></i>
                  <p>Dashboard Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="fa-regular fa-square-plus nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#f3f3ff3 !important;">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid pt-3">
        @yield('contentdashboard')
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<script src="{{asset('plugins/jquery.js')}}"></script>
<script src="{{asset('plugins/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/adminlte.js')}}"></script>
<script src="{{asset('plugins/datatables.js')}}"></script>
@yield('script')
</body>
</html>