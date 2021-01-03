<?php
class User_model extends CI_Model{
    function get_user($user_username){
      $this->db->select('*');
      $this->db->from('table_user');
      $this->db->where('user_username',$user_username);
      $query = $this->db->get();
      return $query->row_array();    
        // $this->db->query("SELECT user_id, user_username, user_password, user_role from table_user where user_username='$user_username'");
        // return $result;
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
      $query = $this->db->get();
      return $query->result_array();
  }
  function all_user(){
      $this->db->select('*');
      $this->db->from('table_user');
      $query = $this->db->get();
      return $query->result_array();
  }
}
