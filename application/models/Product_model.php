<?php
class Product_model extends CI_Model{
    function get_all_product(){
      $this->db->select('*');
      $this->db->from('table_product');
      $this->db->join('table_store','table_store.store_id=table_product.product_store_id','left');
      $this->db->order_by('product_name','asc');
      $query= $this->db->get();
      return $query->result_array();
    }
    function get_my_product($user_id){
      $this->db->select('*');
      $this->db->from('table_product');
      $this->db->join('table_user','table_user.user_store_id=table_product.product_store_id','left');
      $this->db->join('table_store','table_store.store_id=table_product.product_store_id','left');
      $this->db->where('user_id',$user_id);
      $this->db->order_by('product_name','asc');
      $query= $this->db->get();
      return $query->result_array();
    }
  //   function get_all_product(){
  //       $this->db->select('*');
 	// 	$this->db->from('table_product');
 	// 	$query = $this->db->get();
		// return $query->result();
  //   }
    function get_product($product_id){
      $this->db->select('*');
 		  $this->db->from('table_product');
 		  $this->db->where('product_id',$product_id);       
      $query = $this->db->get();
		  return $query->row();
    }

    function get_category(){
      $this->db->select('*');
      $this->db->from('table_category');       
      $query = $this->db->get();
      return $query->result_array();
    }
  
}
