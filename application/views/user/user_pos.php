      <br><br>
        <!-- Begin Page Content -->
        <div style="margin:10px">

          <!-- Page Heading -->
         <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <div style="width: wrap;">
                    <table class='table table-bordered'>
                      <?php
                      $user_id = $this->session->userdata('user_id');
                      // $total = $get_total['product_price'];
                      foreach ($get_member_cart->result_array() as $c):
                        $sales_detail_id=$c['sales_detail_id'];
                        $product_id = $c['sales_detail_product_id'];
                        $product_name = $c['sales_detail_product_name'];
                        $product_unit = $c['sales_detail_product_unit'];
                        $product_price = $c['sales_detail_price'];
                        $cart_total = $c['sales_detail_total'];
                        $qty = $c['sales_detail_qty'];
                        $product_unit = $c['sales_detail_product_unit'];
                        
                      ?>
                      <tr>
                        <td><?= $product_name;?></td>
                        <td style="text-align: center;"><?= $qty;?></td>
                        <td style="text-align: center;"><?= $product_unit;?></td>
                        <td style="text-align: right;">Rp. <?= number_format($cart_total);?></td>
                        <td style="text-align: center;"><a href="<?= base_url().'t/ps/ts/del/'.$sales_detail_id;?>"><i class=" text-danger fas fa-times-circle"></i></a></td>
                      </tr>
                      
                      <?php endforeach;?>
                    </table>
                    <table class="table" >
                      <form method="post" id='form' action="<?= base_url().'t/ps/ts/co';?>">
                      <tr>
                        <td>Total (Rp.)</td>
                        <?php 
                        foreach ($get_total->result_array() as $t) :
                          $temp_total = $t['total'];
                        ;?>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="text" value="<?= number_format($temp_total);?>"></td>
                        <input name="temp_total" id="temp_total" readonly class="form-control" type="hidden" value="<?= $temp_total;?>"></td>
                       <?php endforeach;?>
                      </tr>
                      <tr>
                         <?php $disc=5;?>
                        <td>Discount (<?=$disc;?>%)</td>
                        <?php 
                        foreach ($get_total->result_array() as $t) :
                          $temp_total = $t['total'];
                        ;?>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="text" value="<?= number_format($temp_total*($disc/100));?>"></td>
                        <?php $total_afterdisc=$temp_total*($disc/100);?>
                        <input name="total_afterdisc" id="total_afterdisc" readonly class="form-control" type="hidden" value="<?= $total_afterdisc;?>"></td>
                       <?php endforeach;?>
                       </tr>
                       <tr>
                        <td>Grand Total (Rp.)</td>
                        <?php 
                        foreach ($get_total->result_array() as $t) :
                          $temp_total = $t['total'];
                        ;?>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="text" value="<?= number_format($temp_total-$total_afterdisc);?>"></td>
                        <?php $total=$temp_total-$total_afterdisc; ?>
                        <input name="total" id="total" readonly class="form-control" type="hidden" value="<?= $total;?>"></td>
                       <?php endforeach;?>
                      </tr>
                      <tr>
                        <td>Member id</td>
                        <td style="text-align: right;"><input style="border:none" readonly class="form-control" type="number" name="member_id" id="member_id" onChange="change()" value="<?= $user_id;?>">

                          <label><p style="text-align: left;"><?= $user_name;?>
                          </p></label></td>
                      </tr>

                    </form>
                    </table>

                    <hr>
                    <div class="text-right">
                      <a href="<?= base_url().'t/ps/ts/user_order';?>" class="btn btn-primary">Order</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mb-4">
  
              <div class="row">
                
                <?php
                foreach ($all_product->result_array() as $p):
                  $product_id = $p['product_id'];
                  $product_category = $p['product_category'];
                  $product_name = $p['product_name'];
                  $product_price = $p['product_price'];
                  $product_img = $p['product_img'];
                
                ?>
                  <div class="col-sm-6 col-md-4 mb-4" style="min-height:100px;">
                    <a href="<?= base_url().'t/ps/ts/user_add/'.$product_id;?>">
                    <div class="card text-white shadow text-center bg-default" style=" border:none">
                      <div class="card-body" >
                        <div>
                            <img style="max-width:100%" src="<?= base_url().'assets/img/product/'.$product_img; ?>">
                        </div>
                        <div class="text-success text-uppercase mb-1"><?= $product_name; ?></div>
                        <div class="text-gray-800">Rp. <?= number_format($product_price); ?></div>
                      </div>
                    </div>
                    </a>
                  </div>
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