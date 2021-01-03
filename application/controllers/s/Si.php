<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Si extends CI_Controller {
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
		$this->form_validation->set_rules('username' , 'username' , 'required|trim' , [
			'required' => 'Please input your username.' ,
		]);
		$this->form_validation->set_rules('password' , 'password' , 'required|trim' , [
			'required' => 'Please input your password.'
		]);
		
		if ($this->session->userdata('username'))
		{
			redirect('t/db');
		}

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Toastar | Sign in';
			$this->load->view('template/template_header/template_header', $data);
			$this->load->view('session/session_signin');
			$this->load->view('template/template_footer/template_footer');	
		
		} else {
			$this->_login();
		}

	}

	private function _login(){
		$user_username = $this->input->post('username');
		$user_password = $this->input->post('password');
		$user = $this->User_model->get_user($user_username);
		
		$pass = $user['user_password'];
		$username = $user['user_username'];
		//jika usernya ada
			if ($user_username==$username) {
					//cek password
					if (md5($user_password) == $pass){
						$data = [
							'user_username' => $user['user_username'],
							'user_role' => $user['user_role'],
							'user_id' => $user['user_id'],
						];
						$this->session->set_userdata($data);
						
						if ($user['user_role']==1) {
							redirect('t/db');
						} elseif ($user['user_role']==2) {
							redirect('t/db');
						} elseif ($user['user_role']==3) {
							redirect('t/db');
						} elseif ($user['user_role']==4) {
							redirect('t/db');
						} else {
							redirect('u/us');
						}

					} else {
						$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Password is incorrect!</div>");
						redirect('s/si');	
					}

			} else {
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Username is not registered yet!</div>");
			redirect('s/si');
			}	
	} 
}
