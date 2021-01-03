<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pc extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('Transaction_model');
		$this->load->model('Purchasing_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
		if ($this->session->userdata('user_role')!=0)
		{
			if ($this->session->userdata('user_role')==1) {
				redirect('a/db');
			} elseif ($this->session->userdata('user_role')==2) {
				redirect('t/db');
			} elseif ($this->session->userdata('user_role')==3) {
				redirect('i/db');
			} elseif ($this->session->userdata('user_role')==4) {
				
			} else {
				redirect('u/us');
			}
		} else {
			redirect('s/si');
		}
	}
	
	public function rev()
	{
		$data['title'] = 'Toastar | Purchasing';
		$data['user_name'] = $this->session->userdata('user_username');
		$user_id = $this->session->userdata('user_id');
		$data['content'] = 'manager/manager_purchasing/manager_review';
		$data['all_product'] = $this->Product_model->get_all_product();
		$data['get_all_cart'] = $this->Purchasing_model->get_all_cart();
		$data['get_total'] = $this->Transaction_model->get_total($user_id);
		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
		
	}
}