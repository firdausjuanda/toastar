<br><br>
        <!-- Begin Page Content -->
        <div class="mt-4" style="margin:10px">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Point of Sales</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List of Sales</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <div style="width: wrap;">
                    <table class='table table-bordered'>
                      <?php
                      $user_id = $this->session->userdata('user_id');
                      // $temp_total = $get_total['product_price'];
                      foreach ($get_cart->result_array() as $c):
                        $cart_id = $c['sales_detail_id'];
                        $product_id = $c['sales_detail_product_id'];
                        $product_name = $c['sales_detail_product_name'];
                        $product_unit = $c['sales_detail_product_unit'];
                        $product_price = $c['sales_detail_price'];
                        $cart_total = $c['sales_detail_total'];
                        $qty = $c['sales_detail_qty'];
                        
                      ?>
                      <tr>
                        <td><?= $product_name;?></td>
                        <td style="text-align: center;"><?= $qty;?></td>
                        <td style="text-align: center;"><?= $product_unit;?></td>
                        <td style="text-align: right;">Rp. <?= number_format($cart_total);?></td>
                        <td style="text-align: center;"><a href="<?= base_url().'t/ps/ts/del/'.$cart_id;?>"><i class=" text-danger fas fa-times-circle"></i></a></td>
                      </tr>
                      
                      <?php endforeach;?>
                    </table>
                    <table class="table" >
                      <form method="post" id='form' action="<?= base_url().'t/ps/ts/co';?>">
                     
                      <tr>
                        <td>Discount</td>
                        
                        <td style="text-align: right;">
                        <select onChange="change()" class=" form-control" name="disc">
                            <option value="0">Select Discount</option>
                        <?php 
                        foreach ($get_disc as $disc) :
                          $disc_description = $disc['disc_description'];
                          $disc_price = $disc['disc_price'];
                          $disc_perc = $disc['disc_perc'];
                          $disc_category = $disc['disc_category'];
                        ;?>
                            <option  value="<?=$disc_perc?>"><?=$disc_description?> (<?php if($disc_perc!=0){
                                echo $disc_perc."%";
                            }else{
                                echo "Rp. ".$disc_price;
                            }
                            ?>)</option>
                        </select>
                        </td>
                       <?php endforeach;?>
                      </tr>
                      
                      <tr>
                        <td>Total (Rp.)</td>
                        <?php 
                        foreach ($get_total->result_array() as $t) :
                          $temp_total = $t['temp_total'];
                        ;?>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="text" value="<?= number_format($temp_total);?>"></td>
                        <input name="temp_total" id="temp_total" readonly class="form-control" type="hidden" value="<?= $temp_total;?>">
                       <?php endforeach;?>
                      </tr>
                      
                      <tr>
                        <td>Discounted (Rp.)</td>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="text" value="0"></td>
                        <input name="total_afterdisc" id="total_afterdisc" readonly class="form-control" type="hidden" value="0">
                      </tr>
                      
                      <tr>
                        <td>Grand Total (Rp.)</td>
                        <?php 
                        foreach ($get_total->result_array() as $t) :
                          $total = $t['temp_total'];
                        ;?>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="text" value="<?= number_format($total);?>"></td>
                        <input name="total" id="total" readonly class="form-control" type="hidden" value="<?= $total;?>">
                       <?php endforeach;?>
                      </tr>
                      
                      <tr>
                        <td>Paid (Rp.)</td>
                        <td style="text-align: right;"><input id="paid" name="paid"  class=" form-control" type="number" onChange="change()" value="<?= $get_sales['sales_paid'];?>" required></td>
                      </tr>
                      <tr>
                        <td>Return (Rp.)</td>
                        <td style="text-align: right;"><input class="form-control" type="text" value="<?= number_format($get_sales['sales_return']);?>" style="border:none" required readonly></td>
                        <input id="return" name="return" class="form-control" type="hidden" value=" <?= $get_sales['sales_paid'];?>" required></td>
                      </tr>
                      <tr>
                        <td>Member id</td>
                        <td style="text-align: right;"><input class="form-control" type="number" name="member_id" id="member_id" onChange="change()" value="<?= $get_sales['sales_member_id'];?>">

                          <label><p style="text-align: left;"><?php 
                          $user_username = $get_sales['user_username'];
                          
                          if (!$user_username) {
                            echo "member not found";
                          } else {
                            echo $user_username;  
                          }
                          ?></p></label></td>
                      </tr>

                    </form>
                    </table>

                    <hr>
                    <div class="text-right">
                      <a href="<?= base_url().'t/ps/ts/save';?>" class="btn btn-primary">Check out</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mb-4">
  
              <div class="row">
                
                <?php
                foreach ($all_product as $p):
                  $product_id = $p['product_id'];
                  $product_category = $p['product_category'];
                  $product_name = $p['product_name'];
                  $product_price = $p['product_price'];
                  $product_img = $p['product_img'];
                
                ?>
                <div class="col-md-3 col-sm-4 col-xs-6">
                <a style="color:black" href="<?= base_url().'t/ps/ts/add/'.$product_id;?>">
                  <div class="card mb-3">
                      <img src="<?= base_url().'assets/img/product/'.$product_img;?>" class="card-img-top">
                      <div class="card-body ">
                          <h5 class="card-title"><strong><?= $product_name; ?></strong></h5>
                          <h6 class="card-title">Rp. <?= number_format($product_price); ?></h6>
                          <a href="<?= base_url().'t/ps/ts/add/'.$product_id;;?>" class="btn btn-primary btn-block">Tambahkan</a>
                      </div>
                  </div>
                  </a>
                </div>
                  <!-- <div class="col-sm-6 col-md-4 mb-4" style="min-height:100px;"> -->
                    <!-- <a href="<?= base_url().'t/ps/ts/add/'.$product_id;?>">
                    <div class="card text-white shadow text-center bg-default" style=" border:none; min-height:300px">
                      <div class="card-body" >
                        <div class="">
                            <img style="max-width:100%; " src="<?= base_url().'assets/img/product/'.$product_img; ?>">
                        </div>
                        <br>
                        <div class="text-success text-uppercase mb-1"><?= $product_name; ?></div>
                        <div class="text-gray-800">Rp. <?= number_format($product_price); ?></div>
                      </div>
                    </div>
                    </a>
                  </div> -->
                <?php endforeach; ?>
                
              </div>

            

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script>
        function change(){
          document.getElementById("form").submit();
        }
      </script>