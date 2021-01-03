<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fp extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->User_model->user_data($user_id);
		if ($user_id)
		{
			if($user_data['user_role']==4){
			    redirect('u/us');
			} else {
			    redirect('t/db');
			}
		} else {
			"";
		}
	}
	public function index()
	{
		
		$data['title'] = 'Toastar | Forget Password';
		$this->load->view('template/template_header/template_header', $data);
		$this->load->view('session/session_forget_password');
		$this->load->view('template/template_footer/template_footer');
	}
}
