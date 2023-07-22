<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'setting_model',
			'dashboard_model',
			'organisation_model',
			'user_model',
		));

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
            ;//redirect('login');
	}
	public function index()
	{
		$data['']='';
		$data['title']			= display('add_org');
		$data['orgs']			= $this->organisation_model->read();
        $data['user_role_list']	= $this->dashboard_model->get_user_roles();
        $data['content']  		= $this->load->view('dashboard_admin/org/list',$data,true);
        $this->load->view('dashboard_admin/layout/main_wrapper_lte',$data);
	}

	public function create() {
		$data['title'] = display('add_org');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['district_list']=$this->dashboard_model->district_list();
		$data['org_head_list']=$this->user_model->read_as_list_org();

        $org_id = $this->input->post('org_id');
		#-------------------------------#
		$this->form_validation->set_rules('org_name', display('org_name'),'required|max_length[150]');
		$this->form_validation->set_rules('org_district', display('district'),'required');
		$this->form_validation->set_rules('org_head_id', display('org_head'),'required');
	

		#-------------------------------#//create an Organisation
		if ($org_id == null) { 
			$data['org'] = (object)$postData = [
				'org_id'   		=> $this->input->post('org_id'),
				'org_name'    	=> $this->input->post('org_name',true),
				'org_district'	=> $this->input->post('org_district'),
				'org_head_id'	=> $this->input->post('org_head_id')
			]; // update patient
		} else { 
			$data['org'] = (object)$postData = [
				'org_id'   		=> $this->input->post('org_id'),
				'org_name'    	=> $this->input->post('org_name',true),
				'org_district'	=> $this->input->post('org_district'),
				'org_head_id'	=> $this->input->post('org_head_id')
			]; 
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($postData['org_id'])) {
				if ($this->organisation_model->create($postData)) {
					/*
					$patient_id = $this->db->insert_id();
					$user=$data['patient']->patient_id;
					$numb=$postData['phone'];
					$response =$this->sms_model->send_sms($numb,'Welcome to Valley Diagnostic Centre. Your userid and password has been generated. Your userid='.$user.' and password= <YourPhoneNumber>.');
					*/
					#set success message
					$this->session->set_flashdata('message', $response.display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_admin/organisation');
			} else {
				if ($this->organisation_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_admin/organisation/edit/'.$postData['org_id']);
			}
		} else {
			$data['content'] = $this->load->view('dashboard_admin/org/form',$data,true);
			$this->load->view('dashboard_admin/layout/main_wrapper_lte',$data);
		}	
	}

	public function edit($org_id = null) 
	{ 
		$data['title'] = display('edit_org');
		$data['district_list']=$this->dashboard_model->district_list();
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['org_head_list']=$this->user_model->read_as_list_org();
		#-------------------------------#
		$data['org'] = $this->organisation_model->read_by_id($org_id);
		$data['content'] = $this->load->view('dashboard_admin/org/form',$data,true);
		$this->load->view('dashboard_admin/layout/main_wrapper_lte',$data);
	}
 
	public function delete($org_id = null) 
	{
		if ($this->organisation_model->delete($org_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard_admin/organisation');
	}
}