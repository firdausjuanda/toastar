<br><br>
<div style="margin: 10px">
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
              <tr>
                <td style="text-align: center;"><img class="rounded-circle" style="width:200px;heigth:200px;" src="https://toastar.firdgroup.com/assets/img/logo/user_default.svg"></td>
              </tr>
              
            </table>
            <table class="table" >
              <form method="post" id='formUsername' action="<?= base_url().'a/us/update_username';?>">
              <?php 
              foreach($user_data_by_username as $d):
                $username = $d['user_username'];
                $firstname = $d['user_firstname'];
                $lastname = $d['user_lastname'];
                $role = $d['user_role'];
                $status = $d['user_status'];
                $id = $d['user_id'];
              ?>
              <tr>
                <td>Username</td>
                <td style="text-align: right;">
                    <input id="user_username" name="user_username" class="form-control" type="text" onChange="change()" value="<?= $username;?>">
                    <input class="form-control" name="user_id" type="hidden" style="border:none;" value="<?= $id;?>" readonly>
                </td>
              </tr>
              </form>
              <form method="post" id='formUser' action="<?= base_url().'a/us/update_user';?>">
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
                    <input class="form-control" name="user_id" type="number" style="border:none;" value="<?= $id;?>" readonly>
                </td>
              </tr>
              <tr>
                <td>Role</td>
                <td style="text-align: right;">
                    <select class="form-control" name="user_role" onChange="change()">
                        <option <?if($role==1){echo "selected";}else{"";}?> value="1">Admin</option>
                        <option <?if($role==2){echo "selected";}else{"";}?> value="2">Team/Employee</option>
                        <option <?if($role==3){echo "selected";}else{"";}?> value="3">Investor</option>
                        <option <?if($role==4){echo "selected";}else{"";}?> value="4">User</option>
                    </select>
                </td>
              </tr
              <tr>
                <td>Status</td>
                <td style="text-align: right;">
                    <select class="form-control" name="user_status" onChange="change()">
                        <option <?if($status==0){echo "selected";}else{"";}?> value="0">Active</option>
                        <option <?if($status==1){echo "selected";}else{"";}?> value="1">Verified</option>
                        <option <?if($status==2){echo "selected";}else{"";}?> value="2">Disabled</option>
                        <option <?if($status==3){echo "selected";}else{"";}?> value="3">Order Banned</option>
                        <option <?if($status==4){echo "selected";}else{"";}?> value="4">Banned</option>
                    </select>
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
        foreach($user_transaction as $ut):
            $product_name = $ut['sales_detail_product_name'];
            $qty = $ut['sales_detail_qty'];
            $date_created = $ut['sales_detail_date_created'];
            $total = $ut['sales_detail_total'];
            $price = $ut['sales_detail_price'];
            
        ?>
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
                                    <p style="font-size:10px; margin:0"><?= $date_created;?></p>
                                    
                                </div>
                            </div>
                    </div>       
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <br>
      </div>
    </div>

<!--Additional-->
    <div class="col-md-3" style="background-color:">
        <a href="<?= base_url().'a/us';?>" class="btn btn-primary";>Go to user list</a>
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