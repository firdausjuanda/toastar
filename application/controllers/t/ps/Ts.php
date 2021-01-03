<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ts extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Product_model');
		$this->load->model('Transaction_model');
		$this->load->model('Discount_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
	}
	public function save()
	{

		$user_id = $this->session->userdata('user_id');
		$sales = $this->Transaction_model->get_sales($user_id);
		$cart_transfer = $this->Transaction_model->cart_transfer($user_id);
		$paid = $sales['sales_paid'];
		$total = $sales['sales_total'];
		$check = $paid - $total;
		if ($check < 0) {
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Not enough money!</div>");
			redirect('t/ps/ps');
		} else {
			
			$user_id = $this->session->userdata('user_id');
			$sales_status = 0;
			$this->db->select('*');
			$this->db->from('table_sales');
			$this->db->where('sales_status', 0,'left');
			$this->db->where('sales_user_id',$user_id,'left');
			$target = $this->db->get()->row_array();
			$data_notif = array(
			    'notif_category' => 1,
			    'notif_target_id' => $target['sales_id'],
			    'notif_user_id' => $target['sales_member_id'],
			    'notif_status' => 0,
			    );
			$this->db->insert('table_notif', $data_notif);
			
			$this->db->set('sales_status',1,false);
			$this->db->where('sales_status', $sales_status);
			$this->db->where('sales_user_id',$user_id);
			$this->db->update('table_sales');

			$this->db->set('sales_detail_status',1,false);
			$this->db->where('sales_detail_status', $sales_status);
			$this->db->where('sales_detail_user_id',$user_id);
			$this->db->update('table_sales_detail');
			
			$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Transaction success!</div>");		
			redirect('t/ps/ps');
		}

		
	}
	public function add($product_id)
	{
		$data=array(
			'sales_paid'=>0,
			'sales_return'=>0,
		);

		$user_id = $this->session->userdata('user_id');
		$this->db->where('sales_status',0);
		$this->db->where('sales_user_id',$user_id);		
		$this->db->update('table_sales',$data);
		
		$product_id_in_cart = $this->Transaction_model->get_product_id_in_cart($product_id);
		if ($product_id_in_cart) {
			$product = $this->Product_model->get_product($product_id);
			$user = $this->session->userdata();
			$user_id=$user['user_id'];
			
			$data_sales_detail = array(
			'sales_detail_sales_id' => 0,
			'sales_detail_user_id' => $user_id,
			'sales_detail_member_id' => 0,
			'sales_detail_product_id' => $product->product_id,
			'sales_detail_product_name' => $product->product_name,
			'sales_detail_product_unit' => $product->product_unit,
			'sales_detail_qty' => $product_id_in_cart->sales_detail_qty+1,
			'sales_detail_price' => $product->product_price,
			'sales_detail_product_base' => $product->product_base*($product_id_in_cart->sales_detail_qty+1),
			'sales_detail_temp_total' => $product->product_price*($product_id_in_cart->sales_detail_qty+1),
			'sales_detail_discount' => 0,
			'sales_detail_total' => $product->product_price*($product_id_in_cart->sales_detail_qty+1),
			'sales_detail_status' => 0,
			
		);
			$this->db->where('sales_detail_user_id',$user_id,false);
			$this->db->where('sales_detail_status',0,false);
			$this->db->where('sales_detail_product_id',$product->product_id,false);
			$this->db->update('table_sales_detail',$data_sales_detail);
            // var_dump($data_sales_detail);die;
			redirect('t/ps/ps');
			
		} else {
		$product = $this->Product_model->get_product($product_id);
		$product_id = $product->product_id; 
		$user_id = $this->session->userdata('user_id');
		
		$data = array(
				'sales_detail_sales_id' => 0,
				'sales_detail_user_id' => $user_id,
				'sales_detail_member_id' => 0,
				'sales_detail_product_id' => $product->product_id,
				'sales_detail_product_unit' => $product->product_unit,
				'sales_detail_product_name' => $product->product_name,
				'sales_detail_qty' => 1,
				'sales_detail_price' => $product->product_price,
				'sales_detail_product_base' => $product->product_base,
				'sales_detail_discount' => 0,
				'sales_detail_total' => $product->product_price,
				'sales_detail_status' => 0,
				
			);
		$this->db->insert('table_sales_detail',$data);
		
		redirect('t/ps/ps');
		}
		
	}
	
	public function user_add($product_id)
	{
		$data=array(
			'sales_paid'=>0,
			'sales_return'=>0,
		);
        $member_id = $this->session->userdata('user_id');
		$user_id = 0;
		$product_id_in_cart = $this->Transaction_model->get_product_id_in_member_cart($product_id,$user_id,$member_id);
// 		var_dump($product_id_in_cart);die;
		if ($product_id_in_cart) {
			$product = $this->Product_model->get_product($product_id);
			$user = $this->session->userdata();
			$user_id=$user['user_id'];
			$data = array(
				'product_id' => $product->product_id,
				'cart_user_id' => $user_id,
				'product_name' => $product->product_name,
				'qty' => $product_id_in_cart->qty+1,
				'product_unit' => $product->product_unit,
				'cart_product_base' => $product->product_base*($product_id_in_cart->qty+1),
				'product_price' => $product->product_price,
				'cart_total' => $product->product_price*($product_id_in_cart->qty+1),
				'discount' => 0,
			);

			$this->db->where('product_id',$product_id);
			$this->db->update('table_cart',$data);
			
			$data_sales_detail = array(
			'sales_detail_sales_id' => 0,
			'sales_detail_user_id' => 0,
			'sales_detail_member_id' => $user_id,
			'sales_detail_product_id' => $product->product_id,
			'sales_detail_product_unit' => $product->product_unit,
			'sales_detail_product_name' => $product->product_name,
			'sales_detail_qty' => $product_id_in_cart->qty+1,
			'sales_detail_price' => $product->product_price,
			'sales_detail_product_base' => $product->product_base,
			'sales_detail_discount' => 0,
			'sales_detail_total' => $product->product_price*($product_id_in_cart->qty+1),
			'sales_detail_status' => 0,
			
		);
			$this->db->where('sales_detail_user_id',$user_id,false);
			$this->db->where('sales_detail_status',0,false);
			$this->db->where('sales_detail_product_id',$product->product_id,false);
// 			$this->db->update('table_sales_detail',$data_sales_detail);
            var_dump($data_sales_detail);die;
			redirect('t/ps/ps');
			
		} else {
		$product = $this->Product_model->get_product($product_id);
		$product_id = $product->product_id; 
		$user = $this->session->userdata();
		$data_cart = array(
			'product_id' => $product->product_id,
			'cart_user_id' => $user['user_id'],
			'product_name' => $product->product_name,
			'qty' => 1,
			'product_unit' => $product->product_unit,
			'product_price' => $product->product_price,
			'cart_product_base' => $product->product_base,
			'cart_total' => $product->product_price,
			'discount' => 0,
		);
		
		$this->db->insert('table_cart',$data_cart);
		
		$data = array(
				'sales_detail_sales_id' => 0,
				'sales_detail_user_id' => 0,
				'sales_detail_member_id' => $user_id,
				'sales_detail_product_id' => $product->product_id,
				'sales_detail_product_name' => $product->product_name,
				'sales_detail_qty' => 1,
				'sales_detail_price' => $product->product_price,
				'sales_detail_product_base' => $product->product_base,
				'sales_detail_discount' => 0,
				'sales_detail_total' => $product->product_price,
				'sales_detail_status' => 0,
				
			);
		$this->db->insert('table_sales_detail',$data);
		
		redirect('t/ps/ps');
		}
		
	}
    
	private function _addSalesDetail($product_id)
	{
		
		$product = $this->Product_model->get_product($product_id); 
		$user = $this->session->userdata();
		$user_id=$user['user_id'];
		$data = array(
				'sales_detail_sales_id' => 0,
				'sales_detail_user_id' => $user_id,
				'sales_detail_member_id' => 0,
				'sales_detail_product_id' => $product->product_id,
				'sales_detail_product_unit' => $product->product_unit,
				'sales_detail_product_name' => $product->product_name,
				'sales_detail_qty' => 1,
				'sales_detail_price' => $product->product_price,
				'sales_detail_product_base' => $product->product_base,
				'sales_detail_discount' => 0,
				'sales_detail_total' => $product->product_price,
				'sales_detail_status' => 0,
				
			);
		$this->db->insert('table_sales_detail',$data);
	}


	public function del($sales_detail_id)
	{
		$product=$this->db->get_where('table_sales_detail',['sales_detail_id'=>$sales_detail_id])->row_array();
		$product_id=$product['sales_detail_product_id'];
		$user = $this->session->userdata();
		$user_id=$user['user_id'];
		$this->db->where('sales_detail_product_id',$product_id,false);
		$this->db->where('sales_detail_user_id',$user_id,false);
		$this->db->where('sales_detail_status',0,false);
		$this->db->delete('table_sales_detail');

		$data=array(
			'sales_paid'=>0,
			'sales_return'=>0,
		);

		$user_id = $this->session->userdata('user_id');
		$this->db->where('sales_status',0);
		$this->db->where('sales_user_id',$user_id);		
		$this->db->update('table_sales',$data);

		redirect('t/ps/ps');
	}

	public function co()
	{
		$this->form_validation->set_rules('total' , 'total' , 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Something wrong!</div>");
			redirect('t/ps/ps');
		
		} else {
		    
			$user_id = $this->session->userdata('user_id');
			$total = $this->input->post('total');
			$paid = $this->input->post('paid');
			$disc = $this->input->post('disc');
			$member_id = $this->input->post('member_id');
			$data = array(
				'sales_total' => $total,
				'sales_tcode' => "T".$member_id."X".time(),
				'sales_paid' => $paid,
				'sales_disc' => $disc,
				'sales_return' => $paid - $total,
				'sales_member_id' => $member_id,
				'sales_user_id' => $user_id,
				
			);
			$this->db->select('*');
			$this->db->from('table_sales');
			$this->db->where('sales_user_id',$user_id,false);
			$this->db->where('sales_status',0,false);
			$existing_data = $this->db->get()->row();
			
			if ($existing_data) {
					$this->db->where('sales_status',0,false);
					$this->db->where('sales_user_id',$user_id);
					$this->db->update('table_sales',$data);
				    
					$sales_id=$existing_data->sales_id;
					$data_sales_detail=array(
						'sales_detail_sales_id'=>$sales_id,
						'sales_detail_member_id'=>$member_id,
					);
					$this->db->where('sales_detail_status',0,false);
					$this->db->where('sales_detail_user_id',$user_id);
					$this->db->update('table_sales_detail',$data_sales_detail);
					redirect('t/ps/ps');
                    
			} else {
				$this->db->insert('table_sales',$data);
				redirect('t/ps/ps');	
			}
			
		}
	}
	
	public function user_order()
	{
		$user_id = $this->session->userdata('user_id');
		$member_cart = $this->Transaction_model->get_total_by_member_id($user_id);
		$disc=5/100;
		$temp_total=$member_cart['temp_total'];
		$temp_total = $temp_total;
		$discount = $temp_total*$disc;
		$total = $temp_total-($temp_total*$disc);
		$member_id = $user_id;
		$data = array(
			'sales_total' => $total,
			'sales_temp_total' => $temp_total,
			'sales_discount' => $discount,
			'sales_tcode' => "T".$member_id."X".time(),
			'sales_member_id' => $member_id,
			'sales_user_id' => 0,
			
		);
		var_dump($data);die;
		$this->db->select('*');
		$this->db->from('table_sales');
		$this->db->where('sales_user_id',$user_id,false);
		$this->db->where('sales_status',0,false);
		$existing_data = $this->db->get()->row();
		
		if ($existing_data) {
				$this->db->where('sales_status',0,false);
				$this->db->where('sales_user_id',$user_id);
				$this->db->update('table_sales',$data);
			// 	echo "Update"; die;
			    
				$sales_id=$existing_data->sales_id;
				$data_sales_detail=array(
					'sales_detail_sales_id'=>$sales_id,
					'sales_detail_member_id'=>$member_id,
				);
				$this->db->where('sales_detail_status',0,false);
				$this->db->where('sales_detail_user_id',$user_id);
				$this->db->update('table_sales_detail',$data_sales_detail);
				redirect('u/us');
                
		} else {
			$this->db->insert('table_sales',$data);
			// echo "Sukses"; die;
			redirect('u/us');	
		}
    }
}
