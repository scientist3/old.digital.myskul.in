<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'user_model',
			'center_model',
			'dashboard_model',
			
		));
		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1) 
			redirect('login');
	}
	public function index()
	{
		# code...
	}
}