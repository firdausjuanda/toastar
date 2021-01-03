<br><br>
        <!-- Begin Page Content -->
        <div style="margin:10px">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Sales Report</h1>
          

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
                      <th >Date</th>
                      <th >Time</th>
                      <th >Category</th>
                      <th >Product name</th>
                      <th >Qty</th>
                      <th >Un</th>
                      <th >Price</th>
                      <th >Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$i = 1;
                  		foreach ($query_all_sales_per_date as $all_sales):
                  			$date = $all_sales['sales_detail_date_created'];
                  			$time = $all_sales['sales_detail_time'];
                  			$category = $all_sales['product_category'];
                  			$product_name = $all_sales['sales_detail_product_name'];
                  			$qty = $all_sales['sales_detail_qty'];
                  			$unit = $all_sales['product_unit'];
                  			$product_price = $all_sales['sales_detail_price'];
                  			$total = $all_sales['sales_detail_total'];
                  			
                  	 ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $date; ?></td>
                      <td><?= $time; ?></td>
                      <td><?php 
                      foreach ($get_category as $cat):
                      	$category_id = $cat['category_id'];
                      	$category_description = $cat['category_description'];
                      ;?>
                      	<?php if ($category_id==$category): ?>
                      		<?php echo $category_description ; ?>
                      	<?php endif ?>
                      	<?php endforeach; ?>
                      </td>
                      <td><?= $product_name;?></td>
                      <td><?= $qty;?></td>
                      <td><?= $unit;?></td>
                      <td><?= number_format($product_price);?></td>
                      <td><?= number_format($total);?></td>
                    </tr>
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
