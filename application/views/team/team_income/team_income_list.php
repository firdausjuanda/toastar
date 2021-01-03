<br><br>
<div style="margin:10px; min-height:77vh">
  <h2>Incoming List</h2>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="card my-1">
                    <p style="color:green; margin-left:5px; margin-bottom:0">Total Income : Rp. <?= number_format($get_inc_total_amount['total']);?></p>
                </div>    
            </div>
          </div>
        <?php
          $user_id = $this->session->userdata('user_id');
          $i=1;
          foreach ($get_all_list as $c):
            $inc_id = $c['inc_id'];
            $inc_description = $c['inc_description'];
            $inc_date_created = $c['inc_date_created'];
            $inc_time = $c['inc_time'];
            $inc_source = $c['inc_source'];
            $inc_amount = $c['inc_amount'];
            $inc_category = $c['inc_category'];
        ?>
        <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card my-2">
                <!--<a href="#">-->
                    <div class="row">
                        <div class="col-md-12 text-muted" style="margin-left:5px;">
                            <h5 style="margin:0"><strong>Rp. <?= number_format($inc_amount);?></strong></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-muted" style="margin-left:5px;">
                            <p style="font-size:12px; margin:0">(<?= $inc_category;?>) <?= $inc_description;?></p>
                            <p style="font-size:10px; margin:0"><?= $inc_source?> |  <?= $inc_date_created;?> (<?= $inc_time;?>)</p>
                            
                        </div>
                    </div>
                    
                <!--</a>-->
            </div>       
        </div>
        </div>
        <?php endforeach;?>
</div>
</div>