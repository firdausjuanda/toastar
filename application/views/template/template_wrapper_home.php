 <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav style="height:45px; background-color:black;" class="navbar navbar-expand navbar-dark topbar mb-12 static-top fixed-top">
        <div class="navbar-brand">
            <div class="navbar-brand-icon">
            <a href="<?=base_url();?>"><img style="height:30px" src="<?php echo base_url().'assets/img/logo/logo_light_1.png'?>"></a>
            </div>
        </div>      
          <!-- Topbar Search -->
          <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">-->
          <!--  <div class="input-group">-->
          <!--    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">-->
          <!--    <div class="input-group-append">-->
          <!--      <button class="btn btn-info" type="button">-->
          <!--        <i class="fas fa-search fa-sm"></i>-->
          <!--      </button>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</form>-->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!--<li class="nav-item dropdown no-arrow">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-search fa-fw"></i>-->
            <!--  </a>-->
              
            <!--  <div class="dropdown-menu dropdown-menu-right p-12 shadow animated--grow-in" aria-labelledby="searchDropdown">-->
            <!--    <form class="form-inline mr-auto w-10000 navbar-search">-->
            <!--      <div class="input-group">-->
            <!--        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">-->
            <!--        <div class="input-group-append">-->
            <!--          <button class="btn btn-info" type="button">-->
            <!--            <i class="fas fa-search fa-sm"></i>-->
            <!--          </button>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </form>-->
            <!--  </div>-->
              
            <!--</li>-->

            <!--<div class="topbar-divider d-sm-block"></div>-->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="<?= base_url().'s/si';?>" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-white">Login</span>
              </a>
            </li>
            
            

          </ul>

        </nav>
        <!-- End of Topbar -->
        <?php 
          $this->load->view($content);
        ?>
      <!-- Footer -->
      
      <footer class="sticky-footer" style="background-color:#eee">
        <hr>
        <div class="centrelizer">
          <div class="copyright text-center text-muted">
            <a>Copyright &copy; 2020 Toastar. All right reserved.</a>
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
  
</div>
