<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rp extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Notification_model');
		$this->load->model('Query_model');
		$user_id = $this->session->userdata('user_id');
        $user_data = $this->User_model->user_data($user_id);
		if ($user_id)
		{
			if(
			    ($user_data['user_role']==1) or
			    ($user_data['user_role']==2) or
			    ($user_data['user_role']==3)
			    ){
			   "";
			} else {
			   redirect('t/db');
			}
		} else {
			redirect('s/si');
		}
	}

	public function td()
	{
		$data['title'] = 'Toastar | Today Sales Report';
		$date_query = $this->Query_model->get_date();
		$date = $date_query->date;
		$data['td'] = $date;
		$data['query_all_sales_per_date'] = $this->Query_model->query_all_sales_per_date($date);
		$data['query_qty_per_date'] = $this->Query_model->query_qty_per_date($date);
		$data['get_category'] = $this->Product_model->get_category();
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
		$data['content'] = 'team/team_report/team_today_sales_report';
		// var_dump($data['query_all_sales_per_date']);die;
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
}