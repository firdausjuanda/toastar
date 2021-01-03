
<?php
if($this->session->userdata('user_id')==0){
    echo "<br><br>";
    $this->load->view('ui/banner/login_banner');
}else{
    "";
}
?>
<div href="#" class='jumbotron1'>
    <div class="centralizer">
        <div class="container">
            <p class="j-title">Hot Packages</p>
            <a href="#"><h4>Lihat paket ></h4></a>
        </div>
    </div>
</div>
<div class='jumbotron2'>
    <div class="centralizer">
        <div class="container">
            <p class="j-title">Toast Family</p>
        <a href="#"><h4>Lihat menu ></h4></a>
        </div>
    </div>
</div>
<div class='jumbotron3'>
    <div class="centralizer">
        <div class="container">
            <p class="j-title">Gelato Squad</p>
        <a href="#"><h4>Lihat menu ></h4></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding:0 5px">
        <div class='jumbotron4'>
            <div class="centralizer">
                <div class="container">
                <p class="j-title">Burger</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-6 m-0" style="padding:0 5px">
        <div class='jumbotron5'>
            <div class="centralizer">
                <div class="container">
                <p class="j-title">Cakes</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div> 
    </div>
</div>

<div class="row">
    <div class="col-md-6" style="padding:0 5px">
        <div class='jumbotron5'>
            <div class="centralizer">
                <div class="container">
                <p class="j-title">Pudding</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-6" style="padding:0 5px">
        <div class='jumbotron4'>
            <div class="centralizer">
                <div class="container">
                 <p class="j-title">Hungriness</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding:0 5px">
        <div class='jumbotron4'>
            <div class="centralizer">
                <div class="container">
                <p class="j-title">Traditionals</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-6 m-0" style="padding:0 5px">
        <div class='jumbotron5'>
            <div class="centralizer">
                <div class="container">     
                <p class="j-title">Bavarages</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php
$this->load->view('ui/utils/gmaps');
?>
