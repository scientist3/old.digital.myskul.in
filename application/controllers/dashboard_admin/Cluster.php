<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'setting_model',
			'dashboard_model',
			'organisation_model',
			'cluster_model',
			'user_model',
		));

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
            redirect('login');
	}
	public function index()
	{
		$data['']='';
		$data['title']			= display('list_cluster');
		$data['clusters']		= $this->cluster_model->read();
        $data['user_role_list']	= $this->dashboard_model->get_user_roles();
        $data['content']  		= $this->load->view('dashboard_admin/cluster/list',$data,true);
        $this->load->view('dashboard_admin/layout/main_wrapper_lte',$data);
	}

	public function create() {
		$data['title'] 				= display('add_cluster');
		$data['user_role_list']		= $this->dashboard_model->get_user_roles();
		$data['coodinator_list']	= $this->user_model->read_as_list_cor();
		$data['org_list']			= $this->organisation_model->read_as_list();

        $org_id = $this->input->post('org_id');
		#-------------------------------#
		$this->form_validation->set_rules('cluster_name', display('cluster_name'),'required|max_length[150]');
		$this->form_validation->set_rules('cluster_org_id', display('cluster_org_id'),'required');
		$this->form_validation->set_rules('cluster_head_id', display('cluster_head_id'),'required');
	

		#-------------------------------# create an Organisation
		// cluster_id	cluster_name	cluster_org_id	cluster_head_id
		if ($org_id == null) { 
			$data['cluster'] = (object)$postData = [
				'cluster_id'   		=> $this->input->post('cluster_id'),
				'cluster_name'    	=> $this->input->post('cluster_name',true),
				'cluster_org_id'	=> $this->input->post('cluster_org_id'),
				'cluster_head_id'	=> $this->input->post('cluster_head_id')
			]; // update patient
		} else { 
			$data['cluster'] = (object)$postData = [
				'cluster_id'   		=> $this->input->post('cluster_id'),
				'cluster_name'    	=> $this->input->post('cluster_name',true),
				'cluster_org_id'	=> $this->input->post('cluster_org_id'),
				'cluster_head_id'	=> $this->input->post('cluster_head_id')
			]; 
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($postData['cluster_id'])) {
				if ($this->cluster_model->create($postData)) {
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
				redirect('dashboard_admin/cluster');
			} else {
				if ($this->cluster_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_admin/cluster/edit/'.$postData['cluster_id']);
			}
		} else {
			$data['content'] = $this->load->view('dashboard_admin/cluster/form',$data,true);
			$this->load->view('dashboard_admin/layout/main_wrapper_lte',$data);
		}	
	}

	public function edit($cluster_id = null) 
	{ 
		$data['title'] = display('edit_cluster');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['coodinator_list']	= $this->user_model->read_as_list_cor();
		$data['org_list']			= $this->organisation_model->read_as_list();
		#-------------------------------#
		$data['cluster'] = $this->cluster_model->read_by_id($cluster_id);
		$data['content'] = $this->load->view('dashboard_admin/cluster/form',$data,true);
		$this->load->view('dashboard_admin/layout/main_wrapper_lte',$data);
	}
 
	public function delete($cluster_id = null) 
	{
		if ($this->cluster_model->delete($cluster_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard_admin/cluster');
	}
}