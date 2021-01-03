<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ck extends	 CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_User');
        $this->load->helper('sms');
		// $this->load->model('Product_model');
		// $this->load->model('Cart_model');
		// $this->load->library('form_validation');
	}
	public function index()
	{
		sendsms('082380732823','percobaan kirim sms dari zenziva');
	}
}
