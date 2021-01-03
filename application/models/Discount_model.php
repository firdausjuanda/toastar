<?php
class Discount_model extends CI_Model{

    function get_disc()
    {
        $this->db->select('*');
        $this->db->from('table_discount');
        $this->db->where('disc_status',1,'false');
        $query=$this->db->get();
        return $query->result_array();
    }
    
}