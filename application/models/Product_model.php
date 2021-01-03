<?php
class Product_model extends CI_Model{
    function get_all_product(){
        $result=$this->db->query("SELECT * FROM table_product ORDER BY product_name ASC");
        return $result;
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
