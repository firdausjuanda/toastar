<?php
class Purchasing_model extends CI_Model{

    function get_pch_cart($user_id){
        $this->db->select('*');
        $this->db->from('table_pch_cart');
        $this->db->where('pch_cart_user_id',$user_id,false);
        $query = $this->db->get();
        return $query->result_array();
        // $query = $this->db->get();
        // return $query->row_array();
        // $result=$this->db->query("SELECT * FROM table_pch_cart WHERE pch_cart_user_id = '$user_id'");
        // return $result;
    }
    function get_all_cart(){
        $this->db->select('DATE_FORMAT(pch_date_created,"%e %b %Y") AS pch_date_created,DATE_FORMAT(pch_date_created,"%H:%i") AS pch_time,pch_item,pch_qty,pch_brand,pch_status,pch_user_id,pch_unit,pch_total,pch_price,pch_id');
        $this->db->from('table_pch');
        $this->db->where('pch_status',1);
        $this->db->order_by('pch_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    function cart_transfer($user_id){
        // $sales = $this->get_sales->row_array();
        // $sales_id = $sales['sales_id'];
        $this->db->select('*');
        $this->db->from('table_cart');
        $this->db->join('table_user','table_user.user_id=table_cart.cart_user_id','left');
        $this->db->join('table_product','table_product.product_id=table_cart.product_id','left');
        $this->db->where('cart_user_id',$user_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    function get_cart_by_id($cart_id){
        $result=$this->db->query("SELECT * from table_cart where cart_id = '$cart_id'");
        return $result;
    }
    function get_product_id_in_cart($product_id){
        $this->db->select('*');
        $this->db->from('table_cart');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get();
        return $query->row();
    }
    function get_pch_total($user_id){
        $result=$this->db->query("SELECT * , sum(pch_cart_total) as total from table_pch_cart where pch_cart_user_id = '$user_id'");
        return $result;
	 }
	 
	function get_pch_total_amount(){
        $result=$this->db->query("SELECT SUM(pch_total) AS total FROM table_pch where pch_status = 1");
        return $result->row_array();
	}
	 
	function get_sales($user_id){
        $this->db->select('*');
        $this->db->from('table_sales');
        $this->db->join('table_user','table_user.user_id=table_sales.sales_member_id','left');
        $this->db->where('sales_user_id',$user_id);
        $this->db->where('sales_status',0);
        $query = $this->db->get();
        return $query->row_array();
	}
    function get_today_sales($user_id){
        $this->db->select('*');
        $this->db->from('table_sales');
        $this->db->join('table_user','table_user.user_id=table_sales.sales_member_id','left');
        $this->db->where('sales_user_id',$user_id);
        $this->db->where('sales_status',0);
        $query = $this->db->get();
        return $query->row_array();
    }
}
