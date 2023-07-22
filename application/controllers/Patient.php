<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'patient_model',
			'dashboard_model',
			'sms_model'
		));
		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1 && $this->session->userdata('user_role') != 10) 
			redirect('login');
	}
 
	public function index()
	{ 
		$data['title'] = display('patient_list');
		
		/*---------- Read Center List And District List ----------*/
		$data['district_list']=$this->dashboard_model->district_list();
		
		$data['patients'] = $this->patient_model->read();
		
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['content'] = $this->load->view('patient/patient',$data,true);
		$this->load->view('layout/main_wrapper_lte',$data);
	} 
	
	public function create() {
		$data['title'] = display('add_patient');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['district_list']=$this->dashboard_model->district_list();
        $id = $this->input->post('id');
		#-------------------------------#
		$this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
		//$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
		$this->form_validation->set_rules('phone', display('phone'),'max_length[20]');
		//$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('address', display('address'),'required|max_length[255]');
		//$this->form_validation->set_rules('status', display('status'),'required');

		//picture upload
        /*$picture = $this->fileupload->do_upload(
            'siteassets/images/users/',
            'picture'
        );
        // if picture is uploaded then resize the picture
        if ($picture !== false && $picture != null) {
            $this->fileupload->do_resize(
                $picture, 
                200,
                200
            );
        }*/

		#-------------------------------#//create a patient
		if ($this->input->post('id') == null) { 
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'patient_id'   => "P".$this->randStrGen(2,7),
				'firstname'    => $this->input->post('firstname',true),
				//'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				//'password' 	   => md5($this->input->post('password')),
				'address' 	   => $this->input->post('address',true),
				'district' 	   => $this->input->post('district'),
				'phone'        => $this->input->post('phone',true),
				'create_date'  => date('Y-m-d'),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => 1 //$this->input->post('status')
			]; // update patient
		} else { 
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'firstname'    => $this->input->post('firstname',true),
				//'password' 	   => md5($this->input->post('password')),
				//'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'address' 	   => $this->input->post('address',true),
				'district' 	   => $this->input->post('district'),
				'phone'        => $this->input->post('phone',true),
				'create_date'  => date('Y-m-d'),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => 1 //$this->input->post('status')
			]; 
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->patient_model->create($postData)) {
					$patient_id = $this->db->insert_id();
					$user=$data['patient']->patient_id;
					$numb=$postData['phone'];
					$response =$this->sms_model->send_sms($numb,'Welcome to Valley Diagnostic Centre. Your userid and password has been generated. Your userid='.$user.' and password= <YourPhoneNumber>.');
					#set success message
					$this->session->set_flashdata('message', $response.display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('patient/profile/' . $patient_id);
			} else {
				if ($this->patient_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('patient/edit/'.$postData['id']);
			}
		} else {
			$data['content'] = $this->load->view('patient/patient_form',$data,true);
			$this->load->view('layout/main_wrapper_lte',$data);
		}	
	}
	
    public function email_check($email, $id)
    { 
        $emailExists = $this->db->select('email')
            ->where('email',$email) 
            ->where_not_in('id',$id) 
            ->get('patient')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }

	public function profile($patient_id = null)
	{ 
		$data['title'] =  display('patient_information');
		#-------------------------------#
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['profile'] = $this->patient_model->read_by_id($patient_id);
		$data['content'] = $this->load->view('patient/patient_profile',$data,true);
		$this->load->view('layout/main_wrapper_lte',$data);
	}

	public function edit($patient_id = null) 
	{ 
		$data['title'] = display('patient_edit');
		$data['district_list']=$this->dashboard_model->district_list();
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		#-------------------------------#
		$data['patient'] = $this->patient_model->read_by_id($patient_id);
		$data['content'] = $this->load->view('patient/patient_form',$data,true);
		$this->load->view('layout/main_wrapper_lte',$data);
	}
 
	public function delete($patient_id = null) 
	{
		if ($this->patient_model->delete($patient_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('patient');
	}

    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
    public function randStrGen($mode = null, $len = null){
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }
    /*
    |----------------------------------------------
    |         Ends of id genaretor
    |----------------------------------------------
    */

	public function document()
	{ 
		$data['title'] = display('document_list');
		$data['documents'] = $this->document_model->read();
		$data['content'] = $this->load->view('document',$data,true);
		if($this->session->userdata('user_role')==1)
			$this->load->view('layout/main_wrapper_lte',$data);
		else if ($this->session->userdata('user_role')==2) {
			$this->load->view('dashboard_incharge/main_wrapper_lte',$data);
		}
	}

    public function document_form()
    {  
        $data['title'] = display('add_document'); 
        /*----------VALIDATION RULES----------*/
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[30]');
        $this->form_validation->set_rules('doctor_name', display('doctor_id'),'max_length[11]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('hidden_attach_file', display('attach_file'),'required|max_length[255]');
        /*-------------STORE DATA------------*/
        $urole = $this->session->userdata('user_role');
        $data['document'] = (object)$postData = array( 
            'patient_id'  => $this->input->post('patient_id'),
            'doctor_id'   => $this->input->post('doctor_id'),
            'description' => $this->input->post('description'),
            'hidden_attach_file' => $this->input->post('hidden_attach_file'),
            'date'        => date('Y-m-d'),
            'upload_by'   => (($urole==10)?0:$this->session->userdata('user_id'))
        );  

        /*-----------CREATE A NEW RECORD-----------*/
        if ($this->form_validation->run() === true) { 
 
            if ($this->document_model->create($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('patient/document_form');
        } else {
            $data['doctor_list'] = $this->doctor_model->doctor_list(); 
            $data['content'] = $this->load->view('document_form',$data,true);
            if($this->session->userdata('user_role')==1)
				$this->load->view('layout/main_wrapper_lte',$data);
			else if ($this->session->userdata('user_role')==2) {
				$this->load->view('dashboard_incharge/main_wrapper_lte',$data);
			}
        }  
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

            $config['upload_path']   = FCPATH .'./assets/attachments/';
            // $config['allowed_types'] = 'csv|pdf|ai|xls|ppt|pptx|gz|gzip|tar|zip|rar|mp3|wav|bmp|gif|jpg|jpeg|jpe|png|txt|text|log|rtx|rtf|xsl|mpeg|mpg|mov|avi|doc|docx|dot|dotx|xlsx|xl|word|mp4|mpa|flv|webm|7zip|wma|svg';
            $config['allowed_types'] = '*';
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
                $data['filepath'] = './assets/attachments/'.$upload['file_name'];
                $data['status'] = true;
                echo json_encode($data);
            }
        }  
    } 

    public function document_delete($id = null)
    {
    	if ($this->document_model->delete($id)) {

	    	$file = $this->input->get('file');
	    	if (file_exists($file)) {
	    		@unlink($file);
	    	}
    		$this->session->set_flashdata('message', display('save_successfully'));

    	} else {
    		$this->session->set_flashdata('exception', display('please_try_again'));
    	}

    	redirect($_SERVER['HTTP_REFERER']);
    }

}
