<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('Transaction_model');
		$this->load->model('Notification_model');
		$this->load->model('User_model');
		$this->load->model('Incoming_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
        $user_data = $this->User_model->user_data($user_id);
		if ($user_id)
		{
			if(
			    ($user_data['user_role']==1) or
			    ($user_data['user_role']==2) or
			    ($user_data['user_role']==3)
			    ){
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
		$data['title'] = 'Toastar | Income';
		$data['user_role'] = $this->session->userdata('user_role');
		$data['user_id'] = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
		$data['menu_pos'] = 'ui/navbar_menu/menu_pos';
		$data['menu_report'] = 'ui/navbar_menu/menu_report';
		$data['menu_pch'] = 'ui/navbar_menu/menu_pch';
		$data['menu_inc'] = 'ui/navbar_menu/menu_inc';
		$data['content'] = 'team/team_income/team_income_index';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
	public function ls()
	{
		$data['title'] = 'Toastar | Income';
		$data['user_role'] = $this->session->userdata('user_role');
		$data['user_id'] = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->User_model->user_data($user_id);
		$data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		$data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
		$data['user_name'] = $data['user_data']['user_username'];
		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
		$data['menu_pos'] = 'ui/navbar_menu/menu_pos';
		$data['menu_report'] = 'ui/navbar_menu/menu_report';
		$data['menu_pch'] = 'ui/navbar_menu/menu_pch';
		$data['menu_inc'] = 'ui/navbar_menu/menu_inc';
		$data['content'] = 'team/team_income/team_income_list';
		$data['get_all_list'] = $this->Incoming_model->get_all_list();
		$data['get_inc_total_amount'] = $this->Incoming_model->get_inc_total_amount();
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
	}

	public function cr()
	{
	    $this->form_validation->set_rules('inc_description' , 'inc_description' , 'required|trim' , [
			'required' => 'Please input income description' ,
		]);
		$this->form_validation->set_rules('inc_source' , 'inc_source' , 'required|trim' , [
			'required' => "Please input source" ,
		]);
	    $this->form_validation->set_rules('inc_category' , 'inc_category' , 'trim|in_list[ICCB,ICAS,ICLN,ICPR,ICIN,ICIV,ICHB]' , [
			'in_list' => 'Please select category',
		]);
	    $this->form_validation->set_rules('inc_amount' , 'inc_amount' , 'required|trim|greater_than[0]' , [
			'required' => 'Please input amount' ,
			'greater_than' => 'Amount must not be zero',
		]);
		if ($this->form_validation->run() == false) {
		    
		    
			$data['title'] = 'Toastar | Point of Sales';
    		$data['user_role'] = $this->session->userdata('user_role');
	    	$data['user_id'] = $this->session->userdata('user_id');
    		$user_id = $this->session->userdata('user_id');
		    $data['user_data'] = $this->User_model->user_data($user_id);
		    $data['notif'] = $this->Notification_model->get_notif($data['user_data']['user_id']);
		    $data['notif_count'] = $this->Notification_model->notif_count($data['user_data']['user_id']);
	    	$data['user_name'] = $data['user_data']['user_username'];
    		$data['menu_dashboard'] = 'ui/navbar_menu/menu_dashboard';
    		$data['menu_pos'] = 'ui/navbar_menu/menu_pos';
    		$data['menu_report'] = 'ui/navbar_menu/menu_report';
    		$data['menu_pch'] = 'ui/navbar_menu/menu_pch';
    		$data['menu_inc'] = 'ui/navbar_menu/menu_inc';
    		$data['content'] = 'team/team_income/team_income_create';
    // 		$data['all_product'] = $this->Product_model->get_all_product();
    		$data['get_inc_cart'] = $this->Incoming_model->get_inc_cart($user_id);
    		$data['get_inc_total'] = $this->Incoming_model->get_inc_total($user_id);
    // 		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
    // 		var_dump($this->Incoming_model->get_inc_cart($user_id)); die;
    		$this->load->view('template/template_header/template_header_main', $data);
    		$this->load->view('template/template_wrapper_team', $data);
    		$this->load->view('template/template_footer/template_footer_main');	
		    
		
		} else {
			$this->_addInc();
		}
		
	}
	
	private function _addInc()
	{
	    $inc_description = $this->input->post('inc_description');
	    $inc_source = $this->input->post('inc_source');
		$inc_amount = $this->input->post('inc_amount');
		$inc_category = $this->input->post('inc_category');
		$inc_total = $this->input->post('inc_total');
		$user_id = $this->session->userdata('user_id');
		
		$data_inc = array(
			'inc_description' => $inc_description,
			'inc_source' => $inc_source,
			'inc_amount' => $inc_amount,
			'inc_category' => $inc_category,
			'inc_user_id' => $user_id,
		);
		
		$this->db->insert('table_inc', $data_inc);

		$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data saved!</div>");
		redirect('t/in/in/cr');
	}
	
	public function del($cart_id)
	{
		$item = $this->db->get_where('table_cart',['cart_id'=>$cart_id])->row_array();
		$item_id=$item['cart_id'];
		$user = $this->session->userdata();
		$user_id = $user['user_id'];
		
		$this->db->where('inc_user_id',$user_id,false);
		$this->db->where('inc_status',0,false);
		$this->db->delete('table_inc');

		redirect('t/in/in/cr');
	}
	
	public function submit()
	{
		$user = $this->session->userdata();
		$user_id = $user['user_id'];
		$user_username = $user['user_username'];
		$data = array(
		    'inc_status' => 1,
		    );
		$this->db->where('inc_user_id',$user_id,false);
		$this->db->where('inc_status',0,false);
		$this->db->update('table_inc', $data);
		
		$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data submitted!</div>");
		redirect('t/in/in/cr');
// 		redirect('https://wa.me/6282380732823?text=*%5BToastar+Notification%5D*%0D%0ACR+to+purchase+something+has+been+created.+Please+check+it+now.%0D%0A%0D%0AClick+here%3A+https://toastar.firdgroup.com/m/pc/pc/rev%0D%0A%0D%0AThank+you%2C%0D%0A*aldo*');
		
		
		
	}
}