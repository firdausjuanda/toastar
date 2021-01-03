<?php
class Notification_model extends CI_Model{
    function get_notif($user_id)
    {
        $this->db->select('*, DATE_FORMAT(notif_date_created,"%e %b %Y") as notif_date,DATE_FORMAT(notif_date_created,"(%H:%i)") as notif_time');
        $this->db->from('table_notif');
        $this->db->join('table_user','table_user.user_id=table_notif.notif_user_id','left');
        $this->db->join('table_sales','table_sales.sales_id=table_notif.notif_target_id','left');
        $this->db->where('notif_user_id',$user_id,false);
        $this->db->order_by('notif_id','desc');
        $query = $this->db->get();
        return $query->result_array(); 
    }
    function notif_count($user_id)
    {
        $this->db->select('count(notif_id)as total_notif');
        $this->db->from('table_notif');
        $this->db->where('notif_user_id',$user_id,false);
        $this->db->where('notif_status',0,false);
        $query = $this->db->get();
        return $query->row(); 
    }
    
}