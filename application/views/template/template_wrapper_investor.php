 <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!--<ul class="navbar-nav bg-gradient-primary sidebar sidebar-lg sidebar-dark accordion" id="accordionSidebar">-->

      <!-- Sidebar - Brand -->
    <!--  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">-->
    <!--    <div class="sidebar-brand-icon">-->
    <!--      <img class="sidebar-brand" style="height: 80px" src="<?=base_url().'assets/img/logo/toastar_trans.png';?>">-->
    <!--    </div>-->
    <!--    <div class="sidebar-brand-text mx-3">Toastar</div>-->
    <!--  </a>-->

      <!-- Divider -->
    <!--  <hr class="sidebar-divider my-0">-->

      <!-- Nav Item - Dashboard -->
    <!--  <li class="nav-item active">-->
    <!--    <a class="nav-link" href="<?= base_url().'t/db';?>">-->
    <!--      <i class="fas fa-fw fa-tachometer-alt"></i>-->
    <!--      <span>Dashboard</span></a>-->
    <!--  </li>-->

      <!-- Divider -->
    <!--  <hr class="sidebar-divider">-->

      <!-- Heading -->
    <!--  <div class="sidebar-heading">-->
    <!--    Menu-->
    <!--  </div>-->
      
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link" href="<?= base_url().'t/ps/ps';?>">-->
    <!--      <i class="fas fa-fw fa-shopping-cart"></i>-->
    <!--      <span>Point of Sales</span></a>-->
    <!--  </li>-->
      
    <!--  <li class="nav-item">-->
    <!--      <a class="nav-link" href="<?= base_url().'t/rp/rp/td';?>">-->
    <!--      <i class="fas fa-fw fa-calendar"></i>-->
    <!--      <span>Sales Report</span></a>-->
    <!--  </li>-->
      
    <!--  <li class="nav-item">-->
    <!--      <a class="nav-link" href="<?= base_url().'t/pc/pc';?>">-->
    <!--      <i class="fas fa-fw fa-box"></i>-->
    <!--      <span>Purchasing</span></a>-->
    <!--  </li>-->
      <!--<li class="nav-item">
    <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
    <!--      <i class="fas fa-fw fa-calendar"></i>-->
    <!--      <span>Report</span>-->
    <!--    </a>-->
    <!--    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
    <!--      <div class="bg-white py-2 collapse-inner rounded">-->
    <!--        <h6 class="collapse-header">Reports:</h6>-->
    <!--        <a class="collapse-item" href="<?= base_url().'t/rp/rp/td';?>">Sales today</a>-->
    <!--        <a class="collapse-item" href="<?= base_url().'t/rp/rp/mtd';?>">Sales month todate</a>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </li>-->
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
    <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
    <!--      <i class="fas fa-fw fa-calendar"></i>-->
    <!--      <span>My Attandance</span>-->
    <!--    </a>-->
    <!--    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
    <!--      <div class="bg-white py-2 collapse-inner rounded">-->
    <!--        <h6 class="collapse-header">Attendance menus:</h6>-->
    <!--        <a class="collapse-item" href="<?= base_url().'t/at/at';?>">Attendance</a>-->
    <!--        <a class="collapse-item" href="<?= base_url().'t/at/ua';?>">Unattendance</a>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </li> -->

      <!-- Divider -->
    <!--  <hr class="sidebar-divider d-none d-md-block">-->

      <!-- Sidebar Toggler (Sidebar) -->
    <!--  <div class="text-center d-none d-md-inline">-->
    <!--    <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
    <!--  </div>-->

    <!--</ul>-->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <div class="navbar-brand">
            <a href="<?=base_url();?>"><strong>TOASTAR</strong></a>
        </div>      
    
          <!-- Topbar Search -->
          <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">-->
          <!--  <div class="input-group">-->
          <!--    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">-->
          <!--    <div class="input-group-append">-->
          <!--      <button class="btn btn-primary" type="button">-->
          <!--        <i class="fas fa-search fa-sm"></i>-->
          <!--      </button>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</form>-->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <!--<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
              <!--  <i class="fas fa-search fa-fw"></i>-->
              <!--</a>-->
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">October 22, 2020</div>
                    <span class="font-weight-bold">We are open order on 30/10/2020!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">October 7, 2020</div>
                    Rp 2.000.000 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">1</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://scontent.fpku2-1.fna.fbcdn.net/v/t1.0-9/p960x960/120655677_2117885121678648_7647253297113222169_o.jpg?_nc_cat=106&ccb=2&_nc_sid=85a577&_nc_eui2=AeF5jKWwtOxfdKPNoc_aYLfQzO_ZqcJzpJ7M79mpwnOknoDFOAR50H2NMo5rLEvfQb2YTY1EgLuIoSGPGeKpBdC3&_nc_ohc=0j1BkPq1bAYAX_gDKi7&_nc_ht=scontent.fpku2-1.fna&tp=6&oh=411b7e47db0ebc58f9e0ef0db22e2719&oe=5FC02363" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Guys, Toastar is amazing.</div>
                    <div class="small text-gray-500">Firdaus Juanda · 58m</div>
                  </div>
                </a>
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user_name;?></span>
                <img class="img-profile rounded-circle" src="<?=base_url().'assets/img/logo/user_default.svg';?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sign out
                </a>
              </div>
            </li>
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-fw"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="menuDropdown">
                <?php $this->load->view($menu_dashboard);?>
                <?php $this->load->view($menu_report);?>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <?php 
          $this->load->view($content);
        ?>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Toastar 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Sure wanna sign out this session?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url().'s/so';?>">Sign out</a>
        </div>
      </div>
    </div>
  </div>
