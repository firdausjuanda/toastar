<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('Transaction_model');
		$this->load->model('Query_model');
		$this->load->model('Purchasing_model');
		$this->load->model('Incoming_model');
	
		if ($this->session->userdata('user_role')!=0)
		{
			if ($this->session->userdata('user_role')==1) {
				
			} elseif ($this->session->userdata('user_role')==2) {
				
			} elseif ($this->session->userdata('user_role')==3) {
			    
			} elseif ($this->session->userdata('user_role')==4) {
			    	
			} else {
				redirect('u/us');
			}
		} else {
			redirect('s/si');
		}
		
	}
	public function index()
	{   
	    
		$data['report'] = $this->Query_model->graf_penjualan_perbulan();
		var_dump($data['report']);
		$data['title'] = 'Toastar | Dashboard';
		$date = date('d M Y');
		$data['user_name'] = $this->session->userdata('user_username');
		$data['get_sales_total_amount'] = $this->Query_model->get_sales_total_amount();
		$data['get_pch_total_amount'] = $this->Purchasing_model->get_pch_total_amount();
		$data['get_inc_total_amount'] = $this->Incoming_model->get_inc_total_amount();
		$data['get_sales_total_item'] = $this->Query_model->get_sales_total_item();
		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
		$data['menu_report'] = 'ui/navbar_menu/menu_report';
		$data['content'] = 'team/team_dashboard/team_dashboard';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_investor', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
}
