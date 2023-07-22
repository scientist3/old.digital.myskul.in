<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'setting_model',
            'test/test_model'
        )); 
        $this->load->dbutil();
    }
    public function index()
    {
    	$data['title']='Testing DBFORGE';
    	$data['db_list']=$this->test_model->db_list();
    	//$data['tbl_list']=$this->test_model->tbl_list();//$data['db_list'][0]);
    	$data['curr_db']=$this->test_model->curr_db();
    	$data['db_l_w_t']=$this->test_model->db_list_with_tbl_list();
    	$data['content']=$this->load->view('test/test1',$data,true);
    	$this->load->view('layout/main_wrapper_lte',$data);
    }
}
