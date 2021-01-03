<?php
class Incoming_model extends CI_Model{
    function get_inc_cart($user_id){
        $this->db->select('*');
        $this->db->from('table_inc');
        $this->db->where('inc_user_id',$user_id,false);
        $this->db->where('inc_status',0,false);
        $query = $this->db->get();
        return $query->result_array();
        // $query = $this->db->get();
        // return $query->row_array();
        // $result=$this->db->query("SELECT * FROM table_inc_cart WHERE inc_cart_user_id = '$user_id'");
        // return $result;
    }
    function get_inc_total($user_id){
        $result=$this->db->query("SELECT * , sum(inc_amount) as total from table_inc where inc_user_id = '$user_id' and inc_status = 0");
        return $result;
	 }
	function get_inc_total_amount(){
        $result=$this->db->query("SELECT * , sum(inc_amount) as total from table_inc where inc_status = 1");
        return $result->row_array();
	}
	
	function get_sales_total_amount(){
        $result=$this->db->query("SELECT * , sum(sales_detail_total) as total_amount from table_sales_detail");
        return $result->row_array();
	}
	function get_sales_total_item(){
        $result=$this->db->query("SELECT * , sum(sales_detail_qty) as total_item from table_sales_detail");
        return $result->row_array();
	}
	
    function get_all_list(){
        $this->db->select('DATE_FORMAT(inc_date_created,"%e %b %Y") AS inc_date_created,DATE_FORMAT(inc_date_created,"%H:%i") AS inc_time,inc_description,inc_amount,inc_source,inc_status,inc_user_id,inc_category,inc_id');
        $this->db->from('table_inc');
        $this->db->where('inc_status',1);
        $query = $this->db->get();
        return $query->result_array();
    }
//     function cart_transfer($user_id){
//         // $sales = $this->get_sales->row_array();
//         // $sales_id = $sales['sales_id'];
//         $this->db->select('*');
//         $this->db->from('table_cart');
//         $this->db->join('table_user','table_user.user_id=table_cart.cart_user_id','left');
//         $this->db->join('table_product','table_product.product_id=table_cart.product_id','left');
//         $this->db->where('cart_user_id',$user_id);
//         $query = $this->db->get();
//         return $query->row_array();
//     }
//     function get_cart_by_id($cart_id){
//         $result=$this->db->query("SELECT * from table_cart where cart_id = '$cart_id'");
//         return $result;
//     }
//     function get_product_id_in_cart($product_id){
//         $this->db->select('*');
//         $this->db->from('table_cart');
//         $this->db->where('product_id',$product_id);
//         $query = $this->db->get();
//         return $query->row();
//     }
    
// 	function get_sales($user_id){
//         $this->db->select('*');
//         $this->db->from('table_sales');
//         $this->db->join('table_user','table_user.user_id=table_sales.sales_member_id','left');
//         $this->db->where('sales_user_id',$user_id);
//         $this->db->where('sales_status',0);
//         $query = $this->db->get();
//         return $query->row_array();
// 	}
//     function get_today_sales($user_id){
//         $this->db->select('*');
//         $this->db->from('table_sales');
//         $this->db->join('table_user','table_user.user_id=table_sales.sales_member_id','left');
//         $this->db->where('sales_user_id',$user_id);
//         $this->db->where('sales_status',0);
//         $query = $this->db->get();
//         return $query->row_array();
//     }
}
