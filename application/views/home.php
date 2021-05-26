
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
            <a href="<?= base_url().'menu';?>" ><h4>Lihat paket ></h4></a>
        </div>
    </div>
</div>
<div href="#" class='jumbotronForAds'>
    <div class="centralizer">
        <div class="container">
        <script type="text/javascript">
            atOptions = {
                'key' : '3f24e11ffe3a5684a5c67b009dce6ed7',
                'format' : 'iframe',
                'height' : 60,
                'width' : 468,
                'params' : {}
            };
            document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.highperformancedisplaycontent.com/3f24e11ffe3a5684a5c67b009dce6ed7/invoke.js"></scr' + 'ipt>');
        </script>
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
