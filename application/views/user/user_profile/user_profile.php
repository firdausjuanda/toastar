<br><br>
<div class="mt-4" style="margin:10px">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>
<div class="row">
<!--Main Profile-->
    <div class="col-md-3" style="background-color:">
        <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <div style="width: wrap;">
            <table class='table table-unbordered'>
              <?php
              $user_id = $this->session->userdata('user_id');?>
              <!--<tr>-->
              <!--  <td style="text-align: center;"><img class="rounded-circle" style="width:200px;heigth:200px;" src="https://toastar.firdgroup.com/assets/img/logo/user_default.svg"></td>-->
              <!--</tr>-->
              
            </table>
            <table class="table" >
              <form method="post" id='formUsername' action="<?= base_url().'u/pr/update_username';?>">
              <?php 
              foreach($user_data_by_username as $d):
                $username = $d['user_username'];
                $firstname = $d['user_firstname'];
                $storename = $d['store_name'];
                $lastname = $d['user_lastname'];
                $phone = $d['user_phone'];
                $id = $d['user_id'];
              ?>
              <tr>
                <td>Username</td>
                <td style="text-align: right;">
                    <input id="user_username" name="user_username" class="form-control" type="text" onChange="change()" id="noSpace" onkeyup='lettersOnly(this)' value="<?= $username;?>">
                </td>
              </tr>
              <tr>
                <td>Storename</td>
                <td style="text-align: right;">
                    <input id="user_storename" name="user_storename" class="form-control" type="text" onChange="change()" id="noSpace" onkeyup='lettersOnly(this)' value="<?= $storename;?>">
                </td>
              </tr>
              </form>
              <form method="post" id='formUser' action="<?= base_url().'u/pr/update_user';?>">
              <tr>
                <td>First Name</td>
                <td style="text-align: right;">
                    <input id="user_firstname" name="user_firstname"  class=" form-control" type="text" onChange="change()" value="<?= $firstname;?>" required>
                </td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td style="text-align: right;">
                    <input id="user_lastname" name="user_lastname" class="form-control" type="text" onChange="change()" value="<?= $lastname;?>" required>
                </td>
              </tr>
              <tr>
                <td>Member id</td>
                <td style="text-align: right;">
                    <input class="form-control" type="number" style="border:none;" value="<?= $id;?>" readonly>
                </td>
              </tr>
              <tr>
                <td>Phone</td>
                <td style="text-align: right;">
                    <input class="form-control" type="number" style="border:none;" value="<?= $phone;?>" readonly>
                </td>
              </tr>
            <?php endforeach;?>
            </form>
            </table>

            <hr>
          </div>
        </div>
      </div>
    </div>

<!--Detail Profile-->
    <div class="col-md-6" style="background-color:">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary text-center">Activities</h6>
        </div>
        <!-- Card Body -->
        
        <br>
        <?php 
        foreach($get_tcode as $gt):
            $tcode_list = $gt['sales_tcode'];
        ?>
        <div class="container" style="margin-bottom:0px">
            <p class="text-success"><strong>Transaction ID: <?= $tcode_list?></strong></p>    
        </div>
        
        <?php 
        foreach($user_transaction as $ut):
            $product_name = $ut['sales_detail_product_name'];
            $qty = $ut['sales_detail_qty'];
            $tcode = $ut['sales_tcode'];
            $date_created = $ut['sales_detail_date_created'];
            $total = $ut['sales_detail_total'];
            $price = $ut['sales_detail_price'];
            $date = $ut['sales_detail_date'];
            $time = $ut['sales_detail_time'];
            
        ?>
        <?php if($tcode == $tcode_list):?>
        <div class="card-body" style="padding-top:2px; padding-bottom:2px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="row">
                                <div class="col-md-12 text-muted" style="margin-left:5px;">
                                    <h5 style="margin:0"><strong><?= $product_name;?></strong></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-muted" style="margin-left:5px;">
                                    <p style="font-size:12px; margin:0">Rp. <?= number_format($price);?> x <?= $qty;?> Porsion | Rp. <?= number_format($total);?></p>
                                    <p style="font-size:10px; margin:0"><?= $date;?> <?= $time;?></p>
                                    
                                </div>
                            </div>
                    </div>       
                </div>
            </div>
        </div>
        
        <?php endif; ?>
        <?php endforeach;?>
        <hr>
        <?php endforeach?>
        <br>
      </div>
    </div>

<!--Additional-->
    <div class="col-md-3" style="background-color:">
        
    </div>    
</div>
</div>
</div>
<script>
    function change(){
      document.getElementById("formUsername").submit();
        }
    function change(){
      document.getElementById("formUser").submit();
        }
</script>
<script>
 function lettersOnly(input){
     var regex = /[^A-Za-z0-9]/gi;
     input.value = input.value.replace(regex,"");
 }
</script>