<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'setting_model',
			'patient_model',
			'contactus_model'
        ));
        if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1) 
			redirect('login');
    }
    // List Doctors
    public function index(){
    	$data['title'] = display('messages');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['messages']=$this->contactus_model->read();
		$data['new_messages'] =$this->contactus_model->new_messages();
		//$data['last_query'] = $this->db->last_query();
		$data['content'] = $this->load->view('contactus/messages',$data,true);
		
		$this->load->view('layout/main_wrapper_lte',$data);
    }
	public function view($id=null){
		$data['title'] = display('message');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$this->contactus_model->read_message($id);
		$data['message']=$this->contactus_model->read_by_id($id);
		$data['content'] = $this->load->view('contactus/view',$data,true);
		
		$this->load->view('layout/main_wrapper_lte',$data);
	}
    public function delete($id = null)
    {
    	if ($this->contactus_model->delete($id)) {
    		$this->session->set_flashdata('message', display('save_successfully'));
    	} else {
    		$this->session->set_flashdata('exception', display('please_try_again'));
    	}
    	redirect('contactus');
    }

}