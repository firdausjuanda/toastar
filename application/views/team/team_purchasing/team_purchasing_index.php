<br><br>
    <div style="margin:10px; min-height: 77vh" >
     <h3>Purchasing</h3>
     <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            
                <?php
                    $user_role = $user_data['user_role'];
                    if(
                        ($user_role == 1) or 
                        ($user_role == 2)
                        ){
                        $this->load->view('ui/button/btn_pch/btn_create_pch');    
                    } else {
                        "";
                    }
                ?>
                <?php $this->load->view('ui/button/btn_pch/btn_list_pch');?>
                <?php
                    $user_role = $user_data['user_role'];
                    if($user_role == 1){
                        $this->load->view('ui/button/btn_pch/btn_print_list_pch');    
                    } else {
                        "";
                    }
                ?>
        </div>
     </div>
    </div>
 
 </div>
