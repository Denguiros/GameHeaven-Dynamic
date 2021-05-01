
<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

  <!-- Page Wrapper -->
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=AdminPanel?>Home">
              <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fas fa-laugh-wink"></i>
              </div>
              <div class="sidebar-brand-text mx-3">Game Heaven <sup>ADMIN</sup></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
              <a class="nav-link" href="<?=AdminPanel?>Home">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Interface
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item ">
          <a class="nav-link" href="<?=AdminPanel?>Users/All Users">
                  <i class="fas fa-users">
                  </i>
                  <span>All Users</span>
                  </a>
          </li>

          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGames" aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-gamepad"></i>
                  <span>Games </span>
              </a>
              <div id="collapseGames" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Games :</h6>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/All Games">All Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/Approved Games">Approved Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/Reported Games">Reported Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/Requested Games">Requested Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/Recommended Games">Recommended Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/Featured Games">Featured Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>Games/Retro Games">Retro Games</a>
                      <a class="collapse-item" href="<?=AdminPanel?>addRetro">Add Retro Game</a>
                  </div>
              </div>
          </li>



         

          <!-- Nav Item - Charts -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePubs" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-upload"></i>
                  <span>Publishers</span>
              </a>
              <div id="collapsePubs" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Publishers :</h6>
                      <a class="collapse-item" href="<?=AdminPanel?>publishers/All Publishers">All Publishers</a>
                      <a class="collapse-item" href="<?=AdminPanel?>publishers/Approved Publishers">Approved Publishers</a>
                      <a class="collapse-item" href="<?=AdminPanel?>publishers/Requested Publishers">Requested Publishers</a>
                  </div>
              </div>
          </li>
          <hr class="sidebar-divider d-none d-md-block">
          <!-- Nav Item - Charts -->
          <?php
          
          
          if($_SESSION["admin"]->level ==0){
              ?>
               <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmins"" aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-users-cog"></i>
                  <span>Admins</span>
              </a>
              <div id="collapseAdmins" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Publishers :</h6>
                      <a class="collapse-item" href="<?=AdminPanel?>admins/all">All Admins</a>
                      <a class="collapse-item" href="<?=AdminPanel?>addAdmin">Add Admin</a>


                  </div>
              </div>
          </li>
              <?php
          } ?>
         

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

      </ul>
      <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar
              <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm"></i>
                          </button>
                      </div>
                  </div>
              </form>
Search -->
              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">



                  




            

                  <div class="topbar-divider d-none d-sm-block"></div>

                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION["admin"]->admin_firstname." ".$_SESSION["admin"]->admin_lastname ?></span>
                          <?php if($_SESSION["admin"]->level == 0) {
                              ?><i class="fas fa-crown"></i>
                              <?php
                          }else{
                              ?>
                              <i class="fas fa-crown"></i>
                              <?php
                          } ?>
                      </a>
                      <!-- Dropdown - User Information -->
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                          </a>
                      </div>
                  </li>

              </ul>

          </nav>


            <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form method="POST" action="">
          <button class="btn btn-primary" type="submit" name="logoutAdmin">Logout</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>