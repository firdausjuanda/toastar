<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Transaction_model');
		$this->load->model('Query_model');
		$this->load->model('Notification_model');
		$this->load->model('Purchasing_model');
		$this->load->model('Incoming_model');
		$user_id = $this->session->userdata('user_id');
        $data_data = $this->User_model->user_data($user_id);
		if ($data_data['user_role']!=0)
		{
			if($data_data['user_role']==4){
			    redirect('u/us');
			} else {
			    "";
			}
		} else {
			redirect('s/si');
		}
	}
	public function index()
	{
		$data['title'] = 'Toastar | Dashboard';
		$date = date('d M Y');
		$data['user_role'] = $this->session->userdata('user_role');
		$data['user_id'] = $this->session->userdata('user_id');
		$data['get_sales_total_amount'] = $this->Query_model->get_sales_total_amount();
		$data['get_pch_total_amount'] = $this->Purchasing_model->get_pch_total_amount();
		$data['get_inc_total_amount'] = $this->Incoming_model->get_inc_total_amount();
		$data['get_sales_total_item'] = $this->Query_model->get_sales_total_item();
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
// 		if($data['user_role']==1){
// 		    $data['notif'] = $this->Notification_model->get_notif_admin();
// 		    $data['notif_count'] = $this->Notification_model->notif_count_admin();    
// 		}else{
		    $data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		    $data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']); 
// 		}
		
		$data['user_name'] = $data['user_data']['user_username'];
		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
		$data['menu_pos'] = 'ui/navbar_menu/menu_pos';
		$data['menu_report'] = 'ui/navbar_menu/menu_report';
		$data['menu_pch'] = 'ui/navbar_menu/menu_pch';
		$data['menu_inc'] = 'ui/navbar_menu/menu_inc';
		$data['content'] = 'team/team_dashboard/team_dashboard';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
}
