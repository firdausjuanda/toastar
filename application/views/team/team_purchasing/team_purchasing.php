<br><br>
  <div style="margin:10px; min-height: 77vh">
    <div style="">
        <a class="btn btn-user btn-secondary" href="#" data-toggle="modal" data-target="#addpchModal">
          <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
          Add New PR
        </a>    
    </div>
    
    <div class=" my-2">
      <!--<div class="card-body p-0">-->

        <!-- Nested Row within Card Body -->
        
        <div class="row">

          <div class="col-lg-4 col-sx-12 col-sm-12">

          <!--<div class="card-body" >-->
              <?= $this->session->flashdata('message'); ?>
              <div style="width: wrap;">
                <table class='table table-ordered table-responsive' width="100%">
                <form method="post" id='form' action="<?= base_url().'t/pc/pc/submit';?>">
                <?php
                  $user_id = $this->session->userdata('user_id');
                  foreach ($get_pch_cart as $c):
                    $pch_cart_id = $c['pch_cart_id'];
                    $pch_cart_item = $c['pch_cart_item'];
                    $pch_cart_brand = $c['pch_cart_brand'];
                    $pch_cart_qty = $c['pch_cart_qty'];
                    $pch_cart_unit = $c['pch_cart_unit'];
                    $pch_cart_price = $c['pch_cart_price'];
                    $pch_cart_total = $c['pch_cart_total'];
                    
                ?>
                  <tr>
                    <td><?= $pch_cart_item;?></td>
                    <td style="text-align: center;"><?= $pch_cart_brand;?></td>
                    <td style="text-align: center;"><?= $pch_cart_qty;?></td>
                    <td style="text-align: center;"><?= $pch_cart_unit;?></td>
                    <td style="text-align: center;"><?=number_format($pch_cart_price);?></td>
                    <td style="text-align: right;"><?= number_format($pch_cart_total);?></td>
                    <td style="text-align: center;"><a href="<?= base_url().'t/pc/pc/del/'.$pch_cart_id;?>"><i class=" text-danger fas fa-times-circle"></i></a></td>
                  </tr>
                  
                  <?php endforeach;?>
                </table>
                <table class="table" >
                  
                  <tr>
                    <td>Total (Rp.)</td>
                    <?php 
                    foreach ($get_pch_total->result_array() as $t) :
                      $total = $t['total'];
                    ;?>
                    <td style="text-align: right;"><input readonly class="form-control" type="text" value="<?= number_format($total);?>"></td>
                    <!--<input name="total" id="total" readonly class="form-control" type="hidden" value="<?= $total;?>"></td>-->
                   <?php endforeach;?>
                  </tr>
                
                </table>

                <hr>
                <div class="text-right">
                  <a href="<?= base_url().'t/pc/pc';?>" class="btn btn-default btn-user">Back</a>
                  <a href="<?= base_url().'t/pc/pc/submit';?>" class="btn btn-primary btn-user">Submit</a>
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
  <div class="modal fade" id="addpchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="container my-2">
                <form class="user" method="post" action="<?= base_url().'t/pc/pc/cr'; ?>">
                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" name="pch_item" placeholder="Item Description" value="<?= set_value('pch_item');?>">
                    <p style="margin: 5px; font-size: 10px;">Deskripsi nama barang yang dibeli.</p>
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo form_error('pch_item');?></div>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" min=0 class="form-control form-control" name="pch_brand" placeholder="Item Brand" value="<?= set_value('pch_brand');?>">
                    <p style="margin: 5px; font-size: 10px;">Merk barang yang dibeli.</p>
                    <div style="color: red;font-size: 10px; margin: 5px;"><?php echo form_error('pch_brand');?></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" min="0" class="form-control form-control" name="pch_qty" placeholder="Quantity" value="<?= set_value('pch_qty');?>">
                  <p style="margin: 5px; font-size: 10px;">Jumlah barang yang dibeli.</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?php echo $this->form_validation->error('pch_qty');?></div>
                </div>
                <div class="form-group">
                  <!--<input type="hidden" name="pch_unit_hidden" value="0">-->
                  <select class="form-control form-control" name="pch_unit" placeholder="Unit" value="<?= set_value('pch_unit');?>">
                  	<option value='0' >Select</option>
                  	<option value="PC">Piece (PC)</option>
                  	<option value="GR">Gram (GR)</option>
                  	<option value="LTR">Liter (LTR)</option>
                  	<option value="SHT">Sheet (SHT)</option>
                  	<option value="UN">Unit (UN)</option>
                  	<option value="SET">Set (SET)</option>
                  	<option value="PER">Person (PER)</option>
                  </select>
                  <p style="margin: 5px; font-size: 10px;">Satuan barang yang dibeli.</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?= form_error('pch_unit');?></div>
                </div>
                <div class="form-group">
                  <input type="number" min="0" class="form-control form-control" name="pch_total" placeholder="Total amount" value="<?= set_value('pch_total');?>">
                  <p style="margin: 5px; font-size: 10px;">Total uang yang dikeluarkan</p>
                  <div style="color: red;font-size: 10px; margin: 5px;"><?php echo $this->form_validation->error('pch_total');?></div>
                </div>
            </div>
              
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
