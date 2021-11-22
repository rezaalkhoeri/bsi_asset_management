    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('mainmenu'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fw fa-info-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-monospace">BSI Asset Management</div>
      </a>

      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
          <img class="img-responsive animated--grow-in" src="<?= base_url('assets/img/icons8-male-user-52.png'); ?>">
        </div>
      </a>

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <span class="mr-2 d-none d-lg-inline text-white-600 small font-weight-bold">Hello, <?= $this->session->userdata('name'); ?></span>
        </div>
      </a>

      <br>

      <div style="margin-top: -100px;">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" data-toggle="modal" data-target="#logoutModal">
          <div class="sidebar-brand-icon" data-target="#logoutModal">
            <button type="submit" class="btn btn-danger btn-user btn-block font-weight-bold">
              Logout
            </button>
        </a>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Yes" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-success" href="<?= base_url('auth/logout'); ?>">Yes</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Item/index'); ?>">
          <i class="fas fa-box"></i>
          <span class="font-weight-bold">Item</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('itemDetail/index'); ?>">
          <i class="fas fa-boxes"></i>
          <span class="font-weight-bold">Item Detail</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Users/index'); ?>">
          <i class="fas fa-users-cog"></i>
          <span class="font-weight-bold">User Management</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Location/index'); ?>">
          <i class="fas fa-map-marker-alt"></i>
          <span class="font-weight-bold">Location</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Requisition/index'); ?>">
          <i class="fas fa-file-signature"></i>
          <span class="font-weight-bold">Requisition</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Distribution/index'); ?>">
          <i class="fas fa-people-carry"></i>
          <span class="font-weight-bold">Distribution</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-block">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->