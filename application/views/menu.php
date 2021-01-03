<br><br>
<div class="mt-4" style="margin:10px">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Terlaris</h1>
    </div>
    <div class="row">

    <?php foreach ($products as $product):?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="card mt-3 mb-3" >
            <img src="<?= base_url().'assets/img/product/'.$product['product_img'];?>" class="card-img-top">
            <div class="card-body ">
                <h5 class="card-title"><strong><?= $product['product_name']; ?></strong></h5>
                <h6 class="card-title">Rp. <?= number_format($product['product_price']); ?></h6>
                <p class="card-text"><?= $product['product_category']; ?></p>
                <a href="<?= base_url().'order/'.$product['product_id'];?>" class="btn btn-primary btn-block">Pesan sekarang</a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    
    </div>
</div>