<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Us extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Transaction_model');
		$this->load->model('Notification_model');
		$this->load->model('Query_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
        $user_data = $this->User_model->user_data($user_id);
		if ($user_id)
		{
			if($user_data['user_role']==1){
			   "";
			} else {
			   redirect('t/db');
			}
		} else {
			redirect('s/si');
		}
	}

	public function index()
	{
		$data['title'] = 'Toastar | User';
		$date_query = $this->Query_model->get_date();
		$date = $date_query->date;
		$data['td'] = $date;
		$data['all_user'] = $this->User_model->all_user();
		$data['query_qty_per_date'] = $this->Query_model->query_qty_per_date($date);
		$data['get_category'] = $this->Product_model->get_category();
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['content'] = 'admin/admin_user/user_list';
		// var_dump($data['query_all_sales_per_date']);die;
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
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
		$data['user_data_by_username'] = $this->User_model->user_data_by_username($username);
	    $data['content'] = 'admin/admin_user/user_profile';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
		
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
			$path = 'a/us/u/'.$user_username;
			redirect($path);
		
		} else {
    		
			$user_firstname = $this->input->post('user_firstname');
			$user_lastname = $this->input->post('user_lastname');
			$user_role = $this->input->post('user_role');
			$user_status = $this->input->post('user_status');
			$user_id = $this->input->post('user_id');
			$data['user_data'] = $this->User_model->user_data($user_id);
	    	$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		    $data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
    		$user_username = $data['user_data']['user_username'];
			$data = array(
				'user_firstname' => $user_firstname,
				'user_lastname' => $user_lastname,
				'user_role' => $user_role,
				'user_status' => $user_status,
			);
			$this->db->where('user_id',$user_id,false);
			$this->db->update('table_user',$data);
			$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data saved!</div>");
			$path = 'a/us/u/'.$user_username;
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
		    $user_username = $this->session->userdata('user_username');
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Username is not available!</div>");
			$path = 'a/us/u/'.$user_username;
			redirect($path);
		
		} else {
		    $user_username = $this->session->userdata('user_username');
			$user_username_changed = $this->input->post('user_username');
			$user_id = $this->input->post('user_id');
			$data['user_data'] = $this->User_model->user_data($user_id);
    		$user_username = $data['user_data']['user_username'];
			$data = array(
				'user_username' => $user_username_changed,
			);
			$this->db->where('user_id',$user_id,false);
            $this->db->update('table_user',$data);
// 			var_dump($data);
// 			var_dump($user_id);die;
            $this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data saved!</div>");
			$path = 'a/us/u/'.$user_username_changed;
			redirect($path);
		}
	}
	
}