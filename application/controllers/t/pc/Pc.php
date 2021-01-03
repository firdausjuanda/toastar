<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pc extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Transaction_model');
		$this->load->model('Purchasing_model');
		$this->load->model('Notification_model');
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
		$data['title'] = 'Toastar | Purchasing';
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
		$data['content'] = 'team/team_purchasing/team_purchasing_index';
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');	
	}
	
	public function ls()
	{
		$data['title'] = 'Toastar | Purchasing';
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
		$data['content'] = 'team/team_purchasing/team_purchasing_list';
		$data['all_product'] = $this->Product_model->get_all_product();
		$data['get_all_cart'] = $this->Purchasing_model->get_all_cart();
		$data['get_pch_total_amount'] = $this->Purchasing_model->get_pch_total_amount();
		$data['get_total'] = $this->Transaction_model->get_total($user_id);
		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
	}
		public function pr_ls()
	{
		$data['title'] = 'Toastar | Purchasing';
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
		$data['content'] = 'team/team_purchasing/team_purchasing_print';
		$data['all_product'] = $this->Product_model->get_all_product();
		$data['get_all_cart'] = $this->Purchasing_model->get_all_cart();
		$data['get_pch_total_amount'] = $this->Purchasing_model->get_pch_total_amount();
		$data['get_total'] = $this->Transaction_model->get_total($user_id);
		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
		$this->load->view('template/template_header/template_header_main', $data);
		$this->load->view('template/template_wrapper_team', $data);
		$this->load->view('template/template_footer/template_footer_main');
	}

	public function cr()
	{
	    $this->form_validation->set_rules('pch_item' , 'pch_item' , 'required|trim' , [
			'required' => 'Please input item description' ,
		]);
		$this->form_validation->set_rules('pch_qty' , 'pch_qty' , 'required|trim' , [
			'required' => "Please input item's brand" ,
		]);
	    $this->form_validation->set_rules('pch_qty' , 'pch_qty' , 'required|trim|greater_than[0]' , [
			'required' => 'Please input quantity' ,
			'greater_than' => 'Quantity must not be zero',
		]);
	    $this->form_validation->set_rules('pch_unit' , 'pch_unit' , 'trim|in_list[PC,GR,LTR,SHT,UN,SET,PER]' , [
			'in_list' => 'Please select unit',
		]);
	    $this->form_validation->set_rules('pch_total' , 'pch_total' , 'required|trim|greater_than[0]' , [
			'required' => 'Please input total amount' ,
			'greater_than' => 'Total must not be zero',
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
    		$data['content'] = 'team/team_purchasing/team_purchasing';
    		$data['all_product'] = $this->Product_model->get_all_product();
    		$data['get_pch_cart'] = $this->Purchasing_model->get_pch_cart($user_id);
    		$data['get_pch_total'] = $this->Purchasing_model->get_pch_total($user_id);
    		$data['get_sales'] = $this->Transaction_model->get_sales($user_id);
    // 		var_dump($data['get_pch_cart']); die;
    		$this->load->view('template/template_header/template_header_main', $data);
    		$this->load->view('template/template_wrapper_team', $data);
    		$this->load->view('template/template_footer/template_footer_main');	
		    
		
		} else {
			$this->_addPch();
		}
		
	}
	
	private function _addPch()
	{
	    $pch_item = $this->input->post('pch_item');
	    $pch_brand = $this->input->post('pch_brand');
		$pch_qty = $this->input->post('pch_qty');
		$pch_unit = $this->input->post('pch_unit');
		$pch_total = $this->input->post('pch_total');
		$user_id = $this->session->userdata('user_id');
		
		$data = array(
			'pch_cart_item' => $pch_item,
			'pch_cart_brand' => $pch_brand,
			'pch_cart_qty' => $pch_qty,
			'pch_cart_unit' => $pch_unit,
			'pch_cart_price' => $pch_total/$pch_qty,
			'pch_cart_total' => $pch_total,
			'pch_cart_user_id' => $user_id,
		);
		
		$this->db->insert('table_pch_cart', $data);
		
		$data_pch = array(
			'pch_item' => $pch_item,
			'pch_brand' => $pch_brand,
			'pch_qty' => $pch_qty,
			'pch_unit' => $pch_unit,
			'pch_price' => $pch_total/$pch_qty,
			'pch_total' => $pch_total,
			'pch_user_id' => $user_id,
		);
		
		$this->db->insert('table_pch', $data_pch);

		$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data saved!</div>");
		redirect('t/pc/pc/cr');
	}
	
	public function del($pch_cart_id)
	{
		$item = $this->db->get_where('table_pch_cart',['pch_cart_id'=>$pch_cart_id])->row_array();
		$item_id=$item['pch_cart_id'];
		$user = $this->session->userdata();
		$user_id = $user['user_id'];

		$this->db->where('pch_cart_id',$item_id,false);
		$this->db->where('pch_cart_user_id',$user_id,false);
// 		$this->db->where('sales_detail_status',0,false);
		$this->db->delete('table_pch_cart');
		
	//	$this->db->where('pch_id',$item_id,false);
		$this->db->where('pch_user_id',$user_id,false);
		$this->db->where('pch_status',0,false);
		$this->db->delete('table_pch');

		redirect('t/pc/pc/cr');
	}
	
	public function submit()
	{
		$user = $this->session->userdata();
		$user_id = $user['user_id'];
		$user_username = $user['user_username'];
		$this->db->select('*');
		$this->db->from('table_pch');
		$this->db->where('pch_status', 0,'left');
		$this->db->where('pch_user_id',$user_id,'left');
		$target = $this->db->get()->row_array();
		$data_notif = array(
		    'notif_category' => 2,
		    'notif_target_id' => $target['pch_id'],
		    'notif_user_id' => $target['pch_user_id'],
		    'notif_status' => 0,
		    );
		$this->db->insert('table_notif', $data_notif);
		$data = array(
		    'pch_status' => 1,
		    );
		$this->db->where('pch_user_id',$user_id,false);
		$this->db->where('pch_status',0,false);
		$this->db->update('table_pch', $data);
		
		$this->db->where('pch_cart_user_id',$user_id,false);
		$this->db->delete('table_pch_cart');
		
        $this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Data submitted!</div>");
		redirect('t/pc/pc/cr');
// 		redirect('https://wa.me/6282380732823?text=*%5BToastar+Notification%5D*%0D%0ACR+to+purchase+something+has+been+created.+Please+check+it+now.%0D%0A%0D%0AClick+here%3A+https://toastar.firdgroup.com/m/pc/pc/rev%0D%0A%0D%0AThank+you%2C%0D%0A*aldo*');
		
		
		
	}
}