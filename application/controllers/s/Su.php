<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Su extends CI_Controller {
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

		$this->form_validation->set_rules('user_firstname' , 'user_firstname' , 'required|trim' , [
			'required' => 'Please input your First Name.' ,
		]);
		$this->form_validation->set_rules('user_lastname' , 'user_lastname' , 'required|trim' , [
			'required' => 'Please input your Last Name.' ,
		]);
		$this->form_validation->set_rules('user_username' , 'user_username' , 'required|trim|is_unique[table_user.user_username]' , [
			'required' => 'Please input your Username.' ,
			'is_unique' => 'Username is not available.'
		]);
		$this->form_validation->set_rules('user_phone' , 'user_phone' , 'required|trim|min_length[12]|max_length[13]' , [
			'required' => 'Please input your phone number.' ,
			'min_length' => 'Phone number must be at least 11 characters in length.',
			'max_length' => 'Phone number must not be more than 12 characters in length.'
		]);
		$this->form_validation->set_rules('user_password' , 'user_password' , 'required|trim' , [
			'required' => 'Please input your password.'
		]);
		$this->form_validation->set_rules('user_password2' , 'user_password2' , 'required|trim|matches[user_password]' , [
			'required' => 'Please input your confirmation password.',
			'matches' => 'Your password is not match.'
		]);
		
		if ($this->session->userdata('username'))
		{
			if ($this->session->userdata('user_role')==1) {
				redirect('a/db');
			} elseif ($this->session->userdata('user_role')==2) {
				redirect('t/db');
			} else {
				redirect('u/db');
			}
		}

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Toastar | Sign up';
			$this->load->view('template/template_header/template_header', $data);
			$this->load->view('session/session_signup');
			$this->load->view('template/template_footer/template_footer');	
		
		} else {
			$this->_signup();
		}
	}
	private function _signup(){
		$firstname = $this->input->post('user_firstname');
		$lastname = $this->input->post('user_lastname');
		$username = $this->input->post('user_username');
		$phone = $this->input->post('user_phone');
		$password = $this->input->post('user_password');
		$user = $this->db->get_where('table_user' , ['user_username' => $username])->row_array();
		
		$data = array(
			'user_firstname' => $firstname,
			'user_lastname' => $lastname,
			'user_username' => $username,
			'user_phone' => $phone,
			'user_role' => 4,
			'user_password'=> md5($password), 
		);
		$this->db->insert('table_user', $data);

		$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Congratulation! Your account was just created. Please login.</div>");
		redirect('s/si');	
	} 

}
