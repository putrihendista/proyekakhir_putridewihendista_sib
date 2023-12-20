<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Putri Dewi Hendista</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ 'dashboard' }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right badge badge-danger"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ '/product' }}" class="nav-link">
            <i class="nav-icon fa fa-cubes"></i>
            <p>
              Produk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ '/chart-data' }}" class="nav-link">
            <i class="nav-icon fas fa-chart-area"></i>
            <p>
              Chart Produk
              <i class="right badge badge-danger"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
              @csrf
              <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              {{ __('Log Out') }}
          </x-responsive-nav-link>
      </form>
        </li>
      </ul>
    </nav>

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
