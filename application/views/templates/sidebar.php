<aside class="main-sidebar sidebar-dark-olive elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/template/back/dist')?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>COVID JEPARA</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/template/back/dist')?>/img/181240000776.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">AnAnt</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url('admin')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right"></i>
              </p>
            </a>
          </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview">
            <a href="<?php echo base_url('admin/tabel_admin')?>" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Covid
              </p>
            </a>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/grafik')?>" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Grafik
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
<!--          <li class="nav-item">
            <a href="<?php// echo base_url('admin/tabel_admin')?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
                <p>Icons</p>
              </a>
            </li>
--> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>