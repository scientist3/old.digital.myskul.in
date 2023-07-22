<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repotedpersons extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'setting_model',
            'pub_user_model',
            'center_model',
            'doctor_model'
        )); 
    }
    // List Doctors
    public function index(){
    	$data['title'] = 'Reported Persons';
    	//$data['center']= $this->center_model->get_center($this->session->userdata('user_id'));
    	//display('doctor_list');
		//$data['center']= $this->center_model->get_center($this->session->userdata('user_id'));
		$data['doctors']= $this->pub_user_model->read();
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		
		$data['content'] = $this->load->view('repoted_persons/repoted_persons',$data,true);
		
		$this->load->view('dashboard_incharge/main_wrapper_lte',$data);
    }

    /*public function create(){

		$data['title'] = display('add_doctor');
		$data['district_list']=$this->dashboard_model->district_list();
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$id = $this->input->post('d_id');
		 #-------------------------------#
        $this->form_validation->set_rules('d_name', display('name') ,'required|max_length[50]');
        $this->form_validation->set_rules('d_distict', display('district') ,'required|max_length[50]');
        /*
        $this->form_validation->set_rules('d_name', display('name') ,'required|max_length[50]');
        $this->form_validation->set_rules('location', display('address') ,'max_length[20]');
        $this->form_validation->set_rules('rooms', display('rooms') ,'numeric|required');
        $this->form_validation->set_rules('beds', display('beds') ,'numeric|required');
		* /
        $this->form_validation->set_rules('d_status',display('status'),'required');
		#-------------------------------#
		if ($this->input->post('d_id') == null) { //create a patient
			$data['doctor'] = (object)$postData = [
				'd_id'    	   	=> $this->input->post('d_id'),
				'd_name'  	   	=> $this->input->post('d_name'),
				'd_distict' 	=> $this->input->post('d_distict'),
				'd_gender' 	   	=> $this->input->post('d_gender'),
				'd_designation' => $this->input->post('d_designation'),
				'd_pop' 	    => $this->input->post('d_pop'),
				'd_contact_no'  => $this->input->post('d_contact_no'),
				'd_doc'       	=> date('Y-m-d h:m:s'),
				'd_status'      => $this->input->post('d_status'),
			]; 
		}/* else { // update patient
			$data['center'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'name'    	   => $this->input->post('firstname'),
				'center_type'  => $this->input->post('center_type'),
				'district' 	   => $this->input->post('district'),
				'location' 	   => $this->input->post('address'),
				'incharge'     => $this->input->post('incharge'),
				'status'       => $this->input->post('status'),
			]; 
		}* /
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['d_id'])) {
				if ($this->doctor_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				redirect('doctor/create');
			}/* else {
				if ($this->patient_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('patient/edit/'.$postData['id']);
			}* /

		} else {
			$data['content'] = $this->load->view('doctor/add_doctor',$data,true);
			
			$this->load->view('layout/main_wrapper_lte',$data);
		}
    }*/
    public function edit(){

    }

    public function delete($id= null){
    	if ($this->doctor_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('doctor');
    }

}