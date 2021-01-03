  <br><br>
  <div style="margin:10px; min-height: 77vh">
    <div style="">
        <a class="btn btn-user btn-secondary" href="#" data-toggle="modal" data-target="#addincModal">
          <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
          Add New Income
        </a>    
    </div>
    
    <div class=" my-2">
      <!--<div class="card-body p-0">-->

        <!-- Nested Row within Card Body -->
        
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sx-12 col-sm-12">

          <!--<div class="card-body" >-->
              <?= $this->session->flashdata('message'); ?>
              <div style="width: wrap;">
                <table class='table table-ordered table-responsive' width="100%">
                <form method="post" id='form' action="<?= base_url().'t/pc/pc/submit';?>">
                <?php
                  $user_id = $this->session->userdata('user_id');
                  foreach ($get_inc_cart as $c):
                    $inc_id = $c['inc_id'];
                    $inc_description = $c['inc_description'];
                    $inc_source = $c['inc_source'];
                    $inc_amount = $c['inc_amount'];
                    $inc_category = $c['inc_category'];
                    
                ?>
                  <tr>
                    <td><?= $inc_description;?></td>                    
                    <td style="text-align: center;"><?= $inc_category;?></td>
                    <td style="text-align: center;"><?= $inc_source;?></td>
                    <td style="text-align: right;"><?= number_format($inc_amount);?></td>
                    <td style="text-align: center;"><a href="<?= base_url().'t/in/in/del/'.$inc_id;?>"><i class=" text-danger fas fa-times-circle"></i></a></td>
                  </tr>
                  
                  <?php endforeach;?>
                </table>
                <table class="table" >
                  
                  <tr>
                    <td>Total (Rp.)</td>
                    <?php 
                    foreach ($get_inc_total->result_array() as $t) :
                      $total = $t['total'];
                    ;?>
                    <td style="text-align: right;"><input readonly class="form-control" type="text" value="<?= number_format($total);?>"></td>
                    <!--<input name="total" id="total" readonly class="form-control" type="hidden" value="<?= $total;?>"></td>-->
                   <?php endforeach;?>
                  </tr>
                
                </table>

                <hr>
                <div class="text-right">
                  <a href="<?= base_url().'t/in/in';?>" class="btn btn-default btn-user">Back</a>
                  <a href="<?= base_url().'t/in/in/submit';?>" class="btn btn-primary btn-user">Submit</a>
                </div>
              </div>
              </form>
            </div>
                
          </div>
          
      <!--  </div>-->
      </div>
    </div>

  </div>
  
    <!-- Logout Modal-->
  <div class="modal fade" id="addincModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Income</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="container my-2">
                <form class="user" method="post" action="<?= base_url().'t/in/in/cr'; ?>">
                <div class="form-group">
                      <select class="form-control form-control" name="inc_category" value="<?= set_value('inc_category');?>">
                      	<option value='0' >Select</option>
                      	<option value="ICCB">Penjualan Consumable (ICCB)</option>
                      	<option value="ICAS">Penjualan Asset (ICAS)</option>
                      	<option value="ICLN">Bayar hutang (ICLN)</option>
                      	<option value="ICPR">Pinjaman Perseorangan (ICPR)</option>
                      	<option value="ICIN">Pinjaman Instansi (ICIN)</option>
                      	<option value="ICIV">Investasi (ICIV)</option>
                      	<option value="ICHB">Hibah (ICHB)</option>
                      </select>
                      <p style="margin: 5px; font-size: 10px;">Kategori income</p>
                      <div style="color: red;font-size: 10px; margin: 5px;"><?= form_error('inc_category');?></div>
                    </div>
                <div class="form-group">
                    <input type="text" min=0 class="form-control form-control" name="inc_source" placeholder="Income source" value="<?= set_value('inc_source');?>">
                    <p style="margin: 5px; font-size: 10px;">Tuliskan nama lengkap orang/instansi</p>
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo form_error('inc_source');?></div>
                  </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control" name="inc_description" placeholder="Income Description" value="<?= set_value('inc_description');?>">
                   <p style="margin: 5px; font-size: 10px;">Deskripsi perolehan income</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?php echo form_error('inc_description');?></div>    
                </div>
                <div class="form-group">
                  <input type="number" min="0" class="form-control form-control" name="inc_amount" placeholder="Amount" value="<?= set_value('inc_amount');?>">
                  <p style="margin: 5px; font-size: 10px;">Jumlah uang yang diperoleh</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?php echo $this->form_validation->error('inc_amount');?></div>
                </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
 </div>
