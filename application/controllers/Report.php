<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'setting_model',
			'patient_model',
			'report_model',
			'sms_model'
        ));
        if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1 && $this->session->userdata('user_role') != 10) 
			redirect('login');
    }
	public function getconfig(){
		echo $this->sms_model->getconfigvalue();
	}
    // List Doctors
    public function index(){
    	$data['title'] = display('report_list');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['reports']=$this->report_model->read();
		$data['content'] = $this->load->view('report/report',$data,true);
		
		$this->load->view('layout/main_wrapper_lte',$data);
    }

    public function create(){

		$data['title'] = display('add_report');
		$data['district_list']=$this->dashboard_model->district_list();
		$data['patients_list']=$this->patient_model->read_as_list();
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$id = $this->input->post('r_id');
		 #-------------------------------#
        $this->form_validation->set_rules('r_name', display('report_title') ,'required|max_length[50]');
		$this->form_validation->set_rules('r_patient_id', display('patient_name') ,'required');
        $this->form_validation->set_rules('hidden_attach_file', display('attach_file'),'required|max_length[255]');
        $this->form_validation->set_rules('r_downloadable', display('downloadable') ,'required');
        $this->form_validation->set_rules('r_status',display('status'),'required');
		#-------------------------------#
		
		// id	patient_id	name	report	date	downloadable	status
		if ($this->input->post('r_id') == null) { //create a patient
			$data['report'] = (object)$postData = [
				'r_id'    	   		=> $this->input->post('r_id'),
				'r_patient_id'  	=> $this->input->post('r_patient_id'),
				'r_name' 			=> $this->input->post('r_name'),
				'r_report' 	   		=> $this->input->post('hidden_attach_file'),
				'r_date'       		=> date('Y-m-d h:m:s'),
				'r_downloadable' 	=> $this->input->post('r_downloadable'),
				'r_status'      	=> $this->input->post('r_status'),
			]; 
		} else { // update patient
			$data['report'] = (object)$postData = [
				'r_id'    	   		=> $this->input->post('r_id'),
				'r_patient_id'  	=> $this->input->post('r_patient_id'),
				'r_name' 			=> $this->input->post('r_name'),
				'r_report' 	   		=> $this->input->post('hidden_attach_file'),
				'r_date'       		=> date('Y-m-d h:m:s'),
				'r_downloadable' 	=> $this->input->post('r_downloadable'),
				'r_status'      	=> $this->input->post('r_status'),
			]; 
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($postData['r_id'])) {
				if ($this->report_model->create($postData)) {
					$user=$data['report']->r_patient_id;
					$p = $this->patient_model->read_by_patient_id($user);
					$numb=$p->phone;
					$response =$this->sms_model->send_sms($numb,'Download your report from our website www.valleydiagnosticcentre.com with your userid: '.$user.' and password= <YourPhoneNumber>.');
					#set success message
					$this->session->set_flashdata('message', $response.'<br>'.display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('report');
			} else { // Update
				if ($this->report_model->update($postData)) {
					$user=$data['report']->r_patient_id;
					$p = $this->patient_model->read_by_patient_id($user);
					$numb=$p->phone;
					$response =$this->sms_model->send_sms($numb,'Download your report from our website www.valleydiagnosticcentre.com with your userid: '.$user.' and password= <YourPhoneNumber>.');
					#set success message
					$this->session->set_flashdata('message', $response.'<br>'.display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('report/edit/'.$postData['r_id']);
			}
		} else {
			$data['content'] = $this->load->view('report/add_report',$data,true);
			$this->load->view('layout/main_wrapper_lte',$data);
		}	
    }
   public function edit($id = null) 
	{ 
		$data['title'] = display('report_edit');
		$data['district_list']=$this->dashboard_model->district_list();
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['patients_list']=$this->patient_model->read_as_list();
		#-------------------------------#
		$data['report'] = $this->report_model->read_by_id($id);
		$data['content'] = $this->load->view('report/add_report',$data,true);
		$this->load->view('layout/main_wrapper_lte',$data);
	}

	public function do_upload()
    {
        ini_set('memory_limit', '200M');
        ini_set('upload_max_filesize', '200M');  
        ini_set('post_max_size', '200M');  
        ini_set('max_input_time', 3600);  
        ini_set('max_execution_time', 3600);

        if (($_SERVER['REQUEST_METHOD']) == "POST") { 
            $filename = $_FILES['attach_file']['name'];
            $filename = strstr($filename, '.', true);
            $email    = $this->session->userdata('email');
            $filename = strstr($email, '@', true)."_".$filename;
            $filename = strtolower($filename);
            /*-----------------------------*/

            $config['upload_path']   = './uploads/report/';
            // $config['allowed_types'] = 'csv|pdf|ai|xls|ppt|pptx|gz|gzip|tar|zip|rar|mp3|wav|bmp|gif|jpg|jpeg|jpe|png|txt|text|log|rtx|rtf|xsl|mpeg|mpg|mov|avi|doc|docx|dot|dotx|xlsx|xl|word|mp4|mpa|flv|webm|7zip|wma|svg';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = 0;
            $config['max_width']     = 0;
            $config['max_height']    = 0;
            $config['file_ext_tolower'] = true; 
            $config['file_name']     =  $filename;
            $config['overwrite']     = false;
			$this->load->library('upload', $config);

            $name = 'attach_file';
            if ( ! $this->upload->do_upload($name) ) {
                $data['exception'] = $this->upload->display_errors();
                $data['status'] = false;
                echo json_encode($data);
            } else {
                $upload =  $this->upload->data();
                $data['message'] = display('upload_successfully');
                $data['filepath'] = './uploads/report/'.$upload['file_name'];
                $data['status'] = true;
                echo json_encode($data);
            }
        }  
    } 

    public function delete($id = null)
    {
    	if ($this->report_model->delete($id)) {

	    	$file = $this->input->get('file');
	    	if (file_exists($file)) {
	    		@unlink($file);
	    	}
    		$this->session->set_flashdata('message', display('delete_successfully'));

    	} else {
    		$this->session->set_flashdata('exception', display('please_try_again'));
    	}

    	redirect($_SERVER['HTTP_REFERER']);
    }

}