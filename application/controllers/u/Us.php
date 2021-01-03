<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Us extends CI_Controller {
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
	}

	public function index()
	{
		$data['title'] = 'Home | Toastar';
		$date = date('d M Y');
		$user_id = $this->session->userdata('user_id');
		$data['user_name'] = $this->session->userdata('user_username');
		$data['user_role'] = $this->session->userdata('user_role');
		$data['user_id'] = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
// 		$data['all_product'] = $this->Product_model->get_all_product();
// 		$data['get_member_cart'] = $this->Transaction_model->get_member_cart($user_id);
// 		$data['get_total'] = $this->Transaction_model->get_total($user_id);
// 		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
		$data['content'] = 'home';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
	}

}