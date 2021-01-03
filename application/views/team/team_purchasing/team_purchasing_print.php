<br><br>
<div style="margin:10px; min-height:77vh">
  <h2>Purchasing List</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="card card-primary my-1">
                    <p style="color:red; margin-left:5px; margin-bottom:0">Total purchasing : Rp. <?= number_format($get_pch_total_amount['total']);?></p>
                </div>    
            </div>
        </div>
        
        
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-responsive table-bordered">
                <tr>
                    <!--<th>No</th>-->
                    <th>Date</th>
                    <th>Time</th>
                    <th>Item</th>
                    <th>Brand</th>
                    <th>Qty</th>
                    <th>Un</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                <?php
                  $user_id = $this->session->userdata('user_id');
                 
                  foreach ($get_all_cart as $c):
                    $pch_id = $c['pch_id'];
                    $pch_item = $c['pch_item'];
                    $pch_date_created = $c['pch_date_created'];
                    $pch_time = $c['pch_time'];
                    $pch_brand = $c['pch_brand'];
                    $pch_qty = $c['pch_qty'];
                    $pch_unit = $c['pch_unit'];
                    $pch_price = $c['pch_price'];
                    $pch_total = $c['pch_total'];  
                ?>
                <tr>
                   
                    <td><?= $pch_date_created;?></td>
                    <td><?= $pch_time;?></td>
                    <td><?= $pch_item;?></td>
                    <td><?= $pch_brand;?></td>
                    <td><?= $pch_qty;?></td>
                    <td><?= $pch_unit;?></td>
                    <td><?= $pch_price;?></td>
                    <td><?= number_format($pch_total);?></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
        </div>
        
    </table>    
</div>
</div>