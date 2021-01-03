<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('Notification_model');
		$this->load->model('User_model');
	}
	
	public function index()
	{
		$data['title'] = 'Toastar';
        $data['content'] = 'home';
        $user_id = $this->session->userdata('user_id');
        
        $this->load->view('template/template_header/template_header_main', $data);
        if ($user_id){
            //ada user    
            $data['user_data'] = $this->User_model->user_data($user_id);
            $data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
            $data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
            $data['user_name'] = $data['user_data']['user_username'];
            $this->load->view('template/template_wrapper_team', $data);
        } else {
            //tidak ada user
    		$this->load->view('template/template_wrapper_home', $data);
        }
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
}
