<br><br>
<div style="margin: 10px; min-height:80vh">
<div class="row">
<!--Main Profile-->
<!--Detail Profile-->
    <div class="col-md-6" style="background-color:">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary text-center">Activities</h6>
        </div>
        <!-- Card Body -->
        
        <br>
        <?php 
        foreach($get_tcode as $gt):
            $tcode_list = $gt['sales_tcode'];
        ?>
        <div class="container" style="margin-bottom:0px">
            <p class="text-success"><strong>Transaction ID: <?= $tcode_list?></strong></p>    
        </div>
        
        <?php 
        foreach($user_transaction as $ut):
            $product_name = $ut['sales_detail_product_name'];
            $qty = $ut['sales_detail_qty'];
            $tcode = $ut['sales_tcode'];
            $date_created = $ut['sales_detail_date_created'];
            $total = $ut['sales_detail_total'];
            $price = $ut['sales_detail_price'];
            $date = $ut['sales_detail_date'];
            $time = $ut['sales_detail_time'];
            
        ?>
        <?php if($tcode == $tcode_list):?>
        <div class="card-body" style="padding-top:2px; padding-bottom:2px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="row">
                                <div class="col-md-12 text-muted" style="margin-left:5px;">
                                    <h5 style="margin:0"><strong><?= $product_name;?></strong></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-muted" style="margin-left:5px;">
                                    <p style="font-size:12px; margin:0">Rp. <?= number_format($price);?> x <?= $qty;?> Porsion | Rp. <?= number_format($total);?></p>
                                    <p style="font-size:10px; margin:0"><?= $date;?> <?= $time;?></p>
                                    
                                </div>
                            </div>
                    </div>       
                </div>
            </div>
        </div>
        
        <?php endif; ?>
        <?php endforeach;?>
        <hr>
        <?php endforeach?>
        <br>
      </div>
    </div>

<!--Additional-->
    <div class="col-md-3" style="background-color:">
        
    </div>    
</div>
</div>
</div>
<script>
    function change(){
      document.getElementById("formUsername").submit();
        }
    function change(){
      document.getElementById("formUser").submit();
        }
</script>
<script>
 function lettersOnly(input){
     var regex = /[^A-Za-z0-9]/gi;
     input.value = input.value.replace(regex,"");
 }
</script>