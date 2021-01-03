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
              <form method="post" id='form' action="#">
              <?php 
              foreach($user_data_by_username as $d):
                $username = $d['user_username'];
                $firstname = $d['user_firstname'];
                $lastname = $d['user_lastname'];
                $id = $d['user_id'];
              ?>
              <tr>
                <td>Username</td>
                <td style="text-align: right;"><input style="border:none;" class="form-control" type="text" value="<?= $username;?>" readonly></td>
                <input name="total" id="total" class="form-control" type="hidden" value="username"></td>
               
              </tr>
              <tr>
                <td>First Name</td>
                <td style="text-align: right;"><input id="paid" name="paid"  class=" form-control" style="border:none;" type="text" onChange="change()" value="<?= $firstname;?>" required readonly></td>
                <input id="paid" name="paid" class="form-control" type="hidden" value="<?= $firstname;?>" required></td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td style="text-align: right;"><input class="form-control" style="border:none;" type="text" value="<?= $lastname;?>" required readonly></td>
                <input id="return" name="return" class="form-control" type="hidden" value="<?= $lastname;?>" required></td>
              </tr>
              <tr>
                <td>Member id</td>
                <td style="text-align: right;"><input class="form-control" style="border:none;" type="number" name="member_id" id="member_id" onChange="change()" value="<?= $id;?>" readonly>
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

        <div class="card-body" style="padding-top:2px; padding-bottom:2px">
            <div class="row">
            </div>
        </div>
        <br>
      </div>
    </div>

<!--Additional-->
    <div class="col-md-3" style="background-color:">
        
    </div>    
</div>
</div>
</div>