<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pr extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Transaction_model');
		$this->load->model('Notification_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
        $data_data = $this->User_model->user_data($user_id);
        if ($data_data['user_role']!=0)
		{
			"";
		} else {
			redirect('s/si');
		}
	}

	public function u($username)
	{   
	    
		$data['title'] = 'Edit Profile';
		$user_id = $this->session->userdata('user_id');
		$data['user_role'] = $this->session->userdata('user_role');
		$data['user_id'] = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['user_transaction'] = $this->Transaction_model->get_sales_detail_by_id($user_id);
		$data['get_tcode'] = $this->Transaction_model->get_tcode_by_id($user_id);
		$data['user_data_by_username'] = $this->User_model->user_data_by_username($username);
		if($username == $data['user_name']){
		    $data['content'] = 'user/user_profile/user_profile';
    		$this->load->view('template/template_header/template_header_main', $data);
    		$this->load->view('template/template_wrapper_team', $data);
    		$this->load->view('template/template_footer/template_footer_main');    
		}else{
		    $data['content'] = 'user/user_profile/user_profile_other';
    		$this->load->view('template/template_header/template_header_main', $data);
    		$this->load->view('template/template_wrapper_team', $data);
    		$this->load->view('template/template_footer/template_footer_main');
		}
		
	}
	public function update_user()
	{
		$this->form_validation->set_rules('user_firstname' , 'user_firstname' , 'required|trim' , [
			'required' => 'Please input your Lastname.' ,
		]);
		$this->form_validation->set_rules('user_lastname' , 'user_lastname' , 'required|trim' , [
			'required' => 'Please input your Lastname.' ,
		]);
		if ($this->form_validation->run() == false) {
		    $user_username = $this->session->userdata('user_username');
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Something wrong!</div>");
			$this->u($user_username);
		
		} else {
			$user_id = $this->session->userdata('user_id');
			$user_username = $this->session->userdata('user_username');
			$user_firstname = $this->input->post('user_firstname');
			$user_lastname = $this->input->post('user_lastname');
			$data = array(
				'user_firstname' => $user_firstname,
				'user_lastname' => $user_lastname,
			);
			$this->db->where('user_id',$user_id,false);
			$this->db->update('table_user',$data);
			$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data saved!</div>");
			$path = 'u/pr/u/'.$user_username;
			redirect($path);
		}
	}
	public function update_username()
	{
		$this->form_validation->set_rules('user_username' , 'user_username' , 'required|trim|is_unique[table_user.user_username]' , [
			'required' => 'Please input your Username.' ,
			'is_unique' => 'Username is not available.'
		]);
		if ($this->form_validation->run() == false) {
		    $user_id = $this->session->userdata('user_id');
		    $user_data = $this->User_model->user_data($user_id);
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Username is not available!</div>");
			$path = 'u/pr/u/'.$user_data['user_username'];
			redirect($path);
		
		} else {
		    $user_username = $this->session->userdata('user_username');
			$user_id = $this->session->userdata('user_id');
			$user_username_changed = $this->input->post('user_username');
			$data = array(
				'user_username' => $user_username_changed,
			);
			$this->db->where('user_id',$user_id,false);
			$this->db->update('table_user',$data);
            $this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data saved!</div>");
            
			$path = 'u/pr/u/'.$user_username_changed;
			redirect($path);
		}
	}


}