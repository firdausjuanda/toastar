<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ps extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Notification_model');
		$this->load->model('Discount_model');
		$this->load->model('Transaction_model');
		
		$user_id = $this->session->userdata('user_id');
        $user_data = $this->User_model->user_data($user_id);
		if ($user_id)
		{
			if(
			    ($user_data['user_role']==1) or
			    ($user_data['user_role']==2)
			    ){
			   "";
			} else {
			   redirect('t/db');
			}
		} else {
			redirect('s/si');
		}
	}
	
	public function index()
	{
		$data['title'] = 'Toastar | Point of Sales';
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
		$data['menu_pos'] = 'ui/navbar_menu/menu_pos';
		$data['menu_report'] = 'ui/navbar_menu/menu_report';
		$data['menu_pch'] = 'ui/navbar_menu/menu_pch';
		$data['menu_inc'] = 'ui/navbar_menu/menu_inc';
		$data['content'] = 'team/team_pos/team_pos';
		$data['get_disc'] = $this->Discount_model->get_disc();
		$data['all_product'] = $this->Product_model->get_my_product($user_id);
		$data['get_cart'] = $this->Transaction_model->get_cart($user_id);
		$data['get_total'] = $this->Transaction_model->get_total($user_id);
		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}

	public function dt()
	{
		$data['title'] = 'Toastar | Point of Sales';
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
		$data['menu_pos'] = 'ui/navbar_menu/menu_pos';
		$data['menu_report'] = 'ui/navbar_menu/menu_report';
		$data['menu_pch'] = 'ui/navbar_menu/menu_pch';
		$data['menu_inc'] = 'ui/navbar_menu/menu_inc';
		$data['content'] = 'team/team_pos/team_pos';
		$data['all_product'] = $this->Product_model->get_all_product();
		$data['get_cart'] = $this->Transaction_model->get_cart($user_id);
		$data['get_total'] = $this->Transaction_model->get_total($user_id);
		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
}
