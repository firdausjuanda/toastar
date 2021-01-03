<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Toastar';
		$data['user_name'] = $this->session->userdata('user_username');
		$data['content'] = 'home';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_home', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
}
