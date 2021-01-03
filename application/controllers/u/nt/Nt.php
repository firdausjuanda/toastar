<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nt extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Notification_model');
		$this->load->model('Product_model');
		$this->load->model('Transaction_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
        $data_data = $this->User_model->user_data($user_id);
        if ($data_data['user_role']!=0)
		{
			"";
		} else {
			redirect('s/si');
		}
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data=array(
		    'notif_status'=> 1,
		    );
		$this->db->where('notif_status',0,'false');
		$this->db->where('notif_user_id',$user_id,'false');
		$this->db->update('table_notif',$data);
	}
	
	public function index()
	{   
	    
		$data['title'] = 'Notification';
		$user_id = $this->session->userdata('user_id');
		$data['user_role'] = $this->session->userdata('user_role');
		$data['user_id'] = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['user_transaction'] = $this->Transaction_model->get_sales_detail_by_id($user_id);
		$data['get_tcode'] = $this->Transaction_model->get_tcode_by_id($user_id);
		$data['content'] = 'user/user_notification';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
		
	}
		
}
	