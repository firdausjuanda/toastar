<?php
class Query_model extends CI_Model{
	// Sales queries
 	function query_sales_per_date($date){
		$this->db->select_sum('sales_detail_total');
		$this->db->from('table_sales_detail');
		// $this->db->where('date(sales_date_created)',$date);
		$query = $this->db->get();
		return $query->result_array();
    }
    function get_sales_total_amount(){
        $this->db->select("*, sum(sales_detail_total) as total_amount from table_sales_detail");
        $this->db->where('sales_detail_status',1,'false');
        $query = $this->db->get();
        return $query->row_array();
	}
	function get_sales_total_item(){
	    $this->db->select("*, sum(sales_detail_qty) as total_item from table_sales_detail");
        $this->db->where('sales_detail_status',1,'false');
        $query = $this->db->get();
        return $query->row_array();
	}
    function query_all_sales_per_date($date){
		
		$this->db->select('DATE_FORMAT(sales_detail_date_created,"%e %b %Y") AS sales_detail_date_created,DATE_FORMAT(sales_detail_date_created,"(%H:%i)") AS sales_detail_time, sales_detail_product_id,sales_detail_qty,sales_detail_user_id,sales_detail_product_name,sales_detail_qty,sales_detail_price,sales_detail_total,product_category,product_unit');
		$this->db->from('table_sales_detail');
		$this->db->order_by('sales_detail_id','asc');
		$this->db->join('table_product','table_product.product_id = table_sales_detail.sales_detail_product_id','left');
// 		$this->db->order_by("sales_detail_date_created", "asc");
// 		$this->db->where('DATE(sales_detail_date_created)',$date);
		$query = $this->db->get();
		return $query->result_array();
    }

    // Qty queries
	function query_qty_per_date($date){
		$this->db->select_sum('sales_detail_qty');
		$this->db->from('table_sales_detail');
		// $this->db->where('date(sales_detail_date_created)',$date);
		$query = $this->db->get();
		return $query->result_array();
    }

    // Time sort queries
	function get_date(){
		$this->db->distinct();
		$this->db->select('DATE_FORMAT(sales_detail_date_created,"%e %b %Y") AS date');
		$this->db->from('table_sales_detail');
		$query = $this->db->get();
		return $query->row();
    }   
    
    function graf_penjualan_perbulan(){
        $query = $this->db->query("SELECT DATE_FORMAT(sales_detail_date_created,'%d') AS tanggal,SUM(sales_detail_total) total FROM table_sales_detail GROUP BY DAY(sales_detail_date_created)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}