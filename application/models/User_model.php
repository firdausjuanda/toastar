<?php
class User_model extends CI_Model{
    function get_user($user_username){
      $this->db->select('*');
      $this->db->from('table_user');
      $this->db->where('user_username',$user_username);
      $this->db->join('table_store','table_store.store_id=table_user.user_store_id', 'left');
      $query = $this->db->get();
      return $query->row_array();
    }
  function user_data($user_id){
      $this->db->select('*');
      $this->db->from('table_user');
      $this->db->where('user_id',$user_id);
      $query = $this->db->get();
      return $query->row_array();
  }
  function user_data_by_username($username){
      $this->db->select('*');
      $this->db->from('table_user');
      $this->db->where('user_username',$username);
      $this->db->join('table_store','table_store.store_id=table_user.user_store_id', 'left');
      $query = $this->db->get();
      return $query->result_array();
  }
  function all_user(){
      $this->db->select('*');
      $this->db->from('table_user');
      $this->db->join('table_store','table_store.store_id=table_user.user_store_id', 'left');
      $query = $this->db->get();
      return $query->result_array();
  }
}
