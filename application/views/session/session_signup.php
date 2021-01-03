  <div style="margin:10px">

    <div class="my-5">
      <div class="p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <style>
                .toastar-image {
                  background: url("<?php echo base_url().'assets/img/logo/logo_primary_0.png'?>");
                  background-position: center;
                  background-size: 450px;
                  background-repeat: no-repeat;
                }
            </style>
          <div class="col-lg-5 d-none d-lg-block toastar-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
              </div>
              <form class="user" method="post" action="<?= base_url().'s/su'; ?>">
                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" name="user_firstname" id="exampleFirstName" placeholder="Nama Depan" value="<?= set_value('user_firstname');?>">
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo form_error('user_firstname');?></div>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control" name="user_lastname" id="exampleLastName" placeholder="Nama Belakang" value="<?= set_value('user_lastname');?>">
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo form_error('user_lastname');?></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control" name="user_username" id="noSpace" onkeyup='lettersOnly(this)' placeholder="Username" value="<?= set_value('user_username');?>">
                  <p style="margin: 5px; font-size: 10px;">Username hanya terdiri dari huruf dan angka</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?= form_error('user_username');?></div>
                </div>
                <div class="form-group">
                  <input type="tel" min="0" class="form-control form-control" name="user_phone" id="examplePhoneNumber" placeholder="Phone Number" value="<?php
                  if(set_value('user_phone')==0){
                      echo 628;
                  }else{
                      echo set_value('user_phone');
                  }
                  ;?>">
                  <p style="margin: 5px; font-size: 10px;">Harap gunakan format berikut: 628xxxxxxxxxx</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?php echo $this->form_validation->error('user_phone');?></div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="user_password" class="form-control form-control" id="exampleInputPassword" placeholder="Password">
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo $this->form_validation->error('user_password');?></div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="user_password2" class="form-control form-control" id="exampleRepeatPassword" placeholder="Ulangi Password">
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo $this->form_validation->error('user_password2');?></div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn btn-block">
                  Daftar
                </button>
                <!-- <hr> -->
                <!-- <a href="index.html" class="btn btn-google btn btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <!--<a class="small" href="<?= base_url().'s/fp';?>">Lupa Password?</a>-->
              </div>
              <div class="text-center">
                <a href="<?= base_url().'s/si';?>">Sudah punya akun? Masuk</a>
              </div>
              <div class="text-center">
                Kembali ke <a href="<?= base_url();?>">halaman utama</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<script>
 function lettersOnly(input){
     var regex = /[^A-Za-z0-9]/gi;
     input.value = input.value.replace(regex,"");
 }
</script>

