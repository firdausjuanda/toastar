<br><br>
        <!-- Begin Page Content -->
        <div style="margin:10px">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User List</h1>
          

          <!-- DataTales Example -->
          <div class="mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sales Report</h6>
            </div> -->
            <div>
              <div class="table-responsive">
                <table class="table" id="dataTable" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th >No.</th>
                      <th >Profile</th>
                      <th >User ID</th>
                      <th >Username</th>
                      <th >First Name</th>
                      <th >Last Name</th>
                      <th >Balance ID</th>
                      <th >Role</th>
                      <th >Phone</th>
                      <th >Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$i = 1;
                  		foreach ($all_user as $au):
                  		    
                  			$id = $au['user_id'];
                  			$username = $au['user_username'];
                  			$firstname = $au['user_firstname'];
                  			$lastname = $au['user_lastname'];
                  			$balance_id = $au['user_balance_id'];
                  			$role = $au['user_role'];
                  			$phone = $au['user_phone'];
                  			$status = $au['user_status'];
                  			$profile = $au['user_pp'];
                  			
                  	 ?>
                  	<a href="#">
                    <tr>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $i; ?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $profile;?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $id; ?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $username; ?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $firstname; ?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $lastname; ?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $balance_id;?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?php 
                        if($role == 1){
                            echo "Admin";
                        }elseif($role == 2){
                            echo "Team";
                        }elseif($role == 3){
                            echo "Investor";
                        }else{
                            echo "User";
                        }
                      
                      ?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?= $phone;?></a></td>
                      <td><a href="<?= base_url().'a/us/u/'.$username;?>"><?php 
                        if($status == 0){
                            echo "Active";
                        }elseif($status == 1){
                            echo "Verified";
                        }elseif($status == 2){
                            echo "Disabled";
                        }elseif($status == 3){
                            echo "Order Banned";
                        }else{
                            echo "Banned";
                        }
                      
                      ?></a></td>
                    </tr>
                    </a>
                    <?php $i++;?>
                	<?php endforeach; ?>                	
                                        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
