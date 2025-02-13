<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('tmp/src/assets/images/logos/pt7.png') }}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
  <ul id="sidebarnav">
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ url('index') }}" aria-expanded="false">
        <span>
          <i class="ti ti-layout-dashboard"></i>
        </span>
        <span class="hide-menu">Dashboard</span>
      </a>
    </li>
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Sale</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ url('pelanggans') }}" aria-expanded="false">
        <span>
          <i class="fas fa-users"></i> <!-- Ikon pelanggan -->
        </span>
        <span class="hide-menu">Pelanggan</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ url('produks') }}" aria-expanded="false">
        <span>
          <i class="fas fa-box-open"></i> <!-- Ikon produk -->
        </span>
        <span class="hide-menu">Produk</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ url('penjualans') }}" aria-expanded="false">
        <span>
          <i class="fas fa-shopping-cart"></i> <!-- Ikon penjualan -->
        </span>
        <span class="hide-menu">Penjualan</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ url('detail_penjualans') }}" aria-expanded="false">
        <span>
          <i class="fas fa-receipt"></i> <!-- Ikon detail penjualan -->
        </span>
        <span class="hide-menu">Detail Penjualan</span>
      </a>
    </li>

    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">AUTH</span>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link" href="javascript:void(0);" aria-expanded="false">
        <span>
          <i class="fas fa-sign-out-alt"></i> <!-- Ikon logout -->
        </span>
        <span class="hide-menu">
          @auth
          <!-- Jika pengguna sudah login -->
          <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-light">Logout</button>
          </form>
          @else
          <!-- Jika pengguna belum login -->
          <a href="{{ route('login') }}">
            <button type="button" class="btn btn-danger">Login</button>
          </a>
          @endauth
        </span>
      </a>
    </li>
  </ul>
</nav>
<!-- End Sidebar navigation -->

      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- Sidebar End -->