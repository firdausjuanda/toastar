
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
            <p class="j-title">Paket Terlaris</p>
            <a href="#"><h4>Lihat paket ></h4></a>
        </div>
    </div>
</div>
<div class='jumbotron2'>
    <div class="centralizer">
        <div class="container">
            <p class="j-title">Sarapan</p>
        <a href="#"><h4>Lihat menu ></h4></a>
        </div>
    </div>
</div>
<div class='jumbotron3'>
    <div class="centralizer">
        <div class="container">
            <p class="j-title">Makan siang</p>
        <a href="#"><h4>Lihat menu ></h4></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="padding:0 5px">
        <div class='jumbotron4'>
            <div class="centralizer">
                <div class="container">
                <p class="j-title">Gorengan</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-6 m-0" style="padding:0 5px">
        <div class='jumbotron5'>
            <div class="centralizer">
                <div class="container">
                <p class="j-title">Makanan ringan</p>
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
                <p class="j-title">Minuman</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-6" style="padding:0 5px">
        <div class='jumbotron4'>
            <div class="centralizer">
                <div class="container">
                 <p class="j-title">Makanan tradisional</p>
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
                <p class="j-title">Herbal</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-6 m-0" style="padding:0 5px">
        <div class='jumbotron5'>
            <div class="centralizer">
                <div class="container">     
                <p class="j-title">Bahan baku</p>
                <a href="#"><h4>Lihat menu ></h4></a>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php
$this->load->view('ui/utils/gmaps');
?>