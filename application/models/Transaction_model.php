<?php
class Transaction_model extends CI_Model{

    function get_cart($user_id){
        $this->db->select('*');
        $this->db->from('table_sales_detail');
        $this->db->where('sales_detail_user_id',$user_id,false);
        $this->db->where('sales_detail_status',0,false);
        $query = $this->db->get();
        return $query;
    }
    function get_member_cart($user_id){
        $this->db->select('*');
        $this->db->from('table_sales_detail');
        $this->db->where('sales_detail_member_id',$user_id,false);
        // $this->db->where('sales_detail_status',0,false);
        $query = $this->db->get();
        return $query;
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
        $this->db->from('table_sales_detail');
        $this->db->where('sales_detail_product_id',$product_id,'false');
        $this->db->where('sales_detail_status',0,'false');
        $query = $this->db->get();
        return $query->row();
    }
    function get_product_id_in_member_cart($product_id,$member_id,$user_id){
        $this->db->select('*');
        $this->db->from('table_sales_detail');
        $this->db->where('sales_detail_status',0,'false');
        $this->db->where('sales_detail_product_id',$product_id,'false');
        $this->db->where('sales_detail_user_id',$user_id,'false');
        $this->db->where('sales_detail_member_id',$member_id,'false');
        $query = $this->db->get();
        return $query->row();
    }
//     function get_total($user_id){
//         $result=$this->db->query("SELECT * , sum(cart_total) as total from table_cart where cart_user_id = '$user_id'");
//         return $result;
// 	}
	function get_total($user_id){
        $this->db->select('*,sum(sales_detail_total) as temp_total');
        $this->db->from('table_sales_detail');
        $this->db->where('sales_detail_user_id',$user_id);
        $this->db->where('sales_detail_status',0);
        $query = $this->db->get();
        return $query;
	}
    function get_total_by_member_id($user_id){
        $this->db->select('*,sum(sales_detail_total) as temp_total');
        $this->db->from('table_sales_detail');
        $this->db->where('sales_detail_member_id',$user_id);
        $this->db->where('sales_detail_status',0);
        $query = $this->db->get();
        return $query->row_array();
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
	function get_sales_detail_by_id($user_id){
        $this->db->select('*, DATE_FORMAT(sales_detail_date_created,"%e %b %Y") as sales_detail_date,DATE_FORMAT(sales_detail_date_created,"(%H:%i)") as sales_detail_time');
        $this->db->from('table_sales_detail');
        $this->db->join('table_user','table_user.user_id=table_sales_detail.sales_detail_member_id','left');
        $this->db->join('table_sales','table_sales.sales_id=table_sales_detail.sales_detail_sales_id','left');
        $this->db->where('sales_detail_member_id',$user_id);
        $this->db->where('sales_detail_status',1);
        $query = $this->db->get();
        return $query->result_array();
	}
	function get_tcode_by_id($user_id){
        $this->db->select('*');
        $this->db->from('table_sales');
        $this->db->join('table_user','table_user.user_id=table_sales.sales_member_id','left');
        $this->db->where('sales_member_id',$user_id);
        $this->db->where('sales_status',1);
        $this->db->order_by('sales_id','desc');
        $query = $this->db->get();
        return $query->result_array();
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
