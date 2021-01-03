<div style="margin:10px">
  <h2>Review Purchasing</h2>
    
    <table class="table table-responsive" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th style="text-align: left; width:10px">No</th>
            <th style="text-align: left;">Item</th>
            <th style="text-align: left;">Date</th>
            <th style="text-align: left;">Brand</th>
            <th style="text-align: center;">Qty</th>
            <th style="text-align: center;">Unit</th>
            <th style="text-align: right;">Price</th>
            <th style="text-align: right;">Total</th>
            <th style="text-align: center;">Action</th>
        </tr>
        <?php
          $user_id = $this->session->userdata('user_id');
          $i=1;
          foreach ($get_all_cart as $c):
            $pch_id = $c['pch_id'];
            $pch_item = $c['pch_item'];
            $pch_date_created = $c['pch_date_created'];
            $pch_brand = $c['pch_brand'];
            $pch_qty = $c['pch_qty'];
            $pch_unit = $c['pch_unit'];
            $pch_price = $c['pch_price'];
            $pch_total = $c['pch_total'];  
        ?>
        <tr>
            <td style="text-align: left;"><?= $i;?></td>
            <td style="text-align: left;"><?= $pch_date_created;?></td>
            <td style="text-align: left;"><?= $pch_item;?></td>
            <td style="text-align: left;"><?= $pch_brand;?></td>
            <td style="text-align: center;"><?= $pch_qty;?></td>
            <td style="text-align: center;"><?= $pch_unit;?></td>
            <td style="text-align: right;"><?=number_format($pch_price);?></td>
            <td style="text-align: right;"><?= number_format($pch_total);?></td>
            <td style="text-align: center;"><a href="#"><i class=" text-danger fas fa-times-circle"></i></a></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>    
</div>
</div>