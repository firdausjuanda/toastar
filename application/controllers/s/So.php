<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class So extends CI_Controller {
    
	public function index()
	{	
		$this->session->unset_userdata('user_username');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_role');
		$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>You have signed out.</div>");
			redirect('s/si');
	} 
}
