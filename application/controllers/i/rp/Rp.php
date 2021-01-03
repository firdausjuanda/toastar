<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rp extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('Query_model');
		if ($this->session->userdata('user_role')==0)
		{
			redirect('s/si');
		}
	}

	public function td()
	{
		$data['title'] = 'Toastar | Today Sales Report';
		$date_query = $this->Query_model->get_date();
		$date = $date_query->date;
		$data['td'] = $date;
		$data['user_name'] = $this->session->userdata('user_username');
		$data['query_all_sales_per_date'] = $this->Query_model->query_all_sales_per_date($date);
		$data['query_qty_per_date'] = $this->Query_model->query_qty_per_date($date);
		$data['get_category'] = $this->Product_model->get_category();
		$data['content'] = 'team/team_report/team_today_sales_report';
		// var_dump($data['query_all_sales_per_date']);die;
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_investor', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
}