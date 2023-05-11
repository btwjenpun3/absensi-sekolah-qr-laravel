<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
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
        <a href="/beranda" class="nav-link {{ ($title === 'Beranda') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Beranda           
          </p>
        </a>        
      </li>
      <li class="nav-item">
        <a href="/scan-qr" class="nav-link {{ ($title === 'Scan QR') ? 'active' : '' }}">
          <i class="nav-icon fas fa-qrcode"></i>
          <p>
            Scan QR           
          </p>
        </a>        
      </li>     
      <li class="nav-item {{ ($title === 'Daftar Murid') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ ($title === 'Daftar Murid') ? 'active' : '' }}">
          <i class="nav-icon fas fa-address-book"></i>
          <p>
            Murid
            <i class="fas fa-angle-left right"></i>            
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Input Murid</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/daftar-murid" class="nav-link {{ ($title === 'Daftar Murid') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Daftar Murid</p>
            </a>
          </li>          
        </ul>
      </li>            
    </ul>
</nav>
<!-- /.sidebar-menu -->