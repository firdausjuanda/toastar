<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {
// 	public function __construct(){
// 		parent:: __construct();
// 	}
	public function index()
	{
// 		    $data['title'] = 'Toastar | Sign in';
// 			$this->load->view('template/template_header/template_header', $data);
// 			$this->load->view('session/session_signin');
// 			$this->load->view('template/template_footer/template_footer');
		
		$data['title'] = 'Toastar';
// 		$data['content'] = 'check';
		$this->load->view('check', $data);	
	}
	
}
