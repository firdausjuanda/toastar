
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
        
        <?php
          $user_id = $this->session->userdata('user_id');
          $i=1;
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
        <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card my-1">
                <!--<a href="#">-->
                    <div class="row">
                        <div class="col-md-12 text-muted" style="margin-left:5px;">
                            <h5 style="margin:0"><strong>Rp. <?= number_format($pch_total);?></strong></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-muted" style="margin-left:5px;">
                            <p style="font-size:12px; margin:0"><?= $pch_item;?> (<?= $pch_qty;?> <?= $pch_unit?>) | <?= $pch_brand;?></p>
                            <p style="font-size:10px; margin:0">Rp. <?= number_format($pch_price);?>/<?= $pch_unit;?> | <?= $pch_date_created;?> (<?= $pch_time;?>)</p>
                            
                        </div>
                    </div>
                    
                <!--</a>-->
            </div>       
        </div>
        </div>
        <?php endforeach;?>
    </table>    
</div>
</div>