
  <div style="margin:10px">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            
            <style>
                .login-image {
                  background: url("<?php echo base_url().'assets/img/logo/logo_primary_0.png'?>");
                  background-position: center;
                  background-size: cover;
                }
            </style>
              <div class="col-lg-6 d-none d-lg-block login-image">
                  <!--<img  src="<?php echo base_url().'assets/img/logo/logo_primary_0.png'?>">-->
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Toastar Login</h1>
                  </div>

                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" action="<?= base_url().'s/si';?>" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username....">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control" id="exampleInputPassword" placeholder="Password....">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">
                      Sign in
                    </button>
                    <hr>
                    <!--<a href="#" class="btn btn-google btn-block">-->
                    <!--  <i class="fab fa-google fa-fw"></i> Login with Google-->
                    <!--</a>-->
                    <!--<a href="#" class="btn btn-facebook btn-block">-->
                    <!--  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook-->
                    <!--</a>-->
                    Tidak punya akun? <a href="#">Buat sekarang</a>  |  
                    kembali ke <a href="<?=base_url();?>">halaman utama</a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <!--<a class="small" href="<?= base_url().'s/fp';?>">Forgot Password?</a>-->
                  </div>
                  <div class="text-center">
                    <!--<a class="small" href="<?= base_url().'s/su';?>">Create an Account!</a>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>