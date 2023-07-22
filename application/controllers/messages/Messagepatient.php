<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messagepatient extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'dashboard_model',
            'messages/message_model',
            'appointment_model' 
		));

        if ( $this->session->userdata('isLogInp') == false || 
             $this->session->userdata('user_role') != 10)
            redirect('user/login');
        /*if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); */
	}
 
    public function index()
    {
        $data['title']    =  display('inbox');
        //$user_id = $this->session->userdata('user_id'); 
        $patient_id = $this->session->userdata('patient_id'); 
        #-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['messages'] = $this->message_model->inbox($patient_id);
        $data['content']  = $this->load->view('messagespatient/inbox' ,$data,true);
        $this->load->view('dashboard_patient/layout/main_wrapper_lte',$data);
    } 
 
	public function sent()
	{
        $data['title']    =  display('sent');
        //$user_id = $this->session->userdata('user_id');
        $user_id = $this->session->userdata('patient_id');  
		#-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['messages'] = $this->message_model->sent($user_id);
		$data['content'] = $this->load->view('messagespatient/sent' ,$data,true);
		$this->load->view('dashboard_patient/layout/main_wrapper_lte',$data);
	} 

    public function inbox_information($id = null, $sender_id = null)
    {  
        $data['title'] = display('messages');
        //$receiver_id = $this->session->userdata('user_id'); 
        $receiver_id = $this->session->userdata('patient_id'); 
        #-------------------------------#
        $this->message_model->update(
            array(
                'id' => $id, 
                'receiver_status' => 1
            )
        );
        #-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['message'] = $this->message_model->inbox_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('messagespatient/inbox_information',$data,true);
        $this->load->view('dashboard_patient/layout/main_wrapper_lte',$data);
    }

    public function sent_information($id = null, $receiver_id = null)
    {  
        $data['title'] = display('messages');
        //$sender_id = $this->session->userdata('user_id'); 
        $sender_id = $this->session->userdata('patient_id'); 
        #-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['message'] = $this->message_model->sent_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('messagespatient/sent_information',$data,true);
        $this->load->view('dashboard_patient/layout/main_wrapper_lte',$data);
    }
 

    public function new_message()
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('receiver_id', display('receiver_name') ,'required|max_length[11]');
        //$this->form_validation->set_rules('subject', display('subject'),'required|max_length[255]');
        $this->form_validation->set_rules('message', display('message'),'required|trim');
        /*-------------STORE DATA------------*/
        //$user_id = $this->session->userdata('user_id');
        $user_id = $this->session->userdata('patient_id');
        $date    = $this->input->post('date');
        $data['appointment_id'] = $this->session->has_userdata('appointment_id')?$this->session->userdata('appointment_id'):$this->input->post('appointment_id');
        #-------------------------------# 
        $data['message'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'sender_id'   => $user_id,
            'receiver_id' => $this->input->post('receiver_id'),
            //'subject'     => $this->input->post('subject'),
            'message'     => $this->input->post('message', true),
            'picture'     => $this->input->post('hidden_attach_file'),
            'datetime'    => date("Y-m-d h:i:s"),
            'sender_status'   => 1, 
            'receiver_status' => 0, 
        );  


        /*-----------CREATE A NEW RECORD-----------*/
        if ($this->form_validation->run() === true) { 
            if ($this->message_model->create($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('message_sent'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            $this->session->set_userdata('appointment_id',$data['appointment_id']);
            redirect('messages/messagepatient/new_message');
        } else {
            $data['title'] = display('new_message');
            $data['user_role_list']=$this->dashboard_model->get_user_roles();
            $data['appointments'] = $this->appointment_model->read_by_patient_id($this->session->userdata('patient_id'));
            $data['appointment_list'] = $this->appointment_model->read_appointment_by_patient_as_list($this->session->userdata('patient_id'));
            $data['user_list'] = $this->message_model->user_list_for_patient($user_id);

            $data['content'] = $this->load->view('messagespatient/new_message',$data,true);
            $this->load->view('dashboard_patient/layout/main_wrapper_lte',$data);
        }  
    }
 

    /*public function delete($id = null, $sender_id = null, $receiver_id = null) 
    {
        $user_id = $this->session->userdata('user_id');
        if ($user_id == $sender_id) {
            $condition = "sender_status";
            $this->message_model->delete($id, $condition);
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else if ($user_id == $receiver_id) {
            $condition = "receiver_status";
            $this->message_model->delete($id, $condition);
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect($_SERVER['HTTP_REFERER']); 
    }*/

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
            $file_path = 'siteassets/images/message/'.$this->session->userdata('patient_id').'/';
            if (!is_dir($file_path))
                mkdir($file_path, 0755,true);

            $config['upload_path']      = $file_path;
            // $config['allowed_types'] = 'csv|pdf|ai|xls|ppt|pptx|gz|gzip|tar|zip|rar|mp3|wav|bmp|gif|jpg|jpeg|jpe|png|txt|text|log|rtx|rtf|xsl|mpeg|mpg|mov|avi|doc|docx|dot|dotx|xlsx|xl|word|mp4|mpa|flv|webm|7zip|wma|svg';
            $config['allowed_types']    = 'pdf|bmp|gif|jpg|jpeg|jpe|png|mpeg|mpg|mov|avi|mp4';
            $config['max_size']         = 20480;
            $config['max_width']        = 0;
            $config['max_height']       = 0;
            $config['file_ext_tolower'] = true; 
            $config['file_name']        =  $filename;
            $config['overwrite']        = false;
            $this->load->library('upload', $config);

            $name = 'attach_file';
            if ( ! $this->upload->do_upload($name) ) {
                $data['exception'] = $this->upload->display_errors();
                $data['status'] = false;
                echo json_encode($data);
            } else {
                $upload =  $this->upload->data();
                $data['message'] = display('upload_successfully');
                $data['filepath'] = $file_path.$upload['file_name'];
                $data['status'] = true;
                echo json_encode($data);
            }
        }  
    }

    public function check_appointment()
    {
        $appointment_id = $this->input->post('appointment_id');

        if (!empty($appointment_id)) {
            $query = $this->appointment_model->get_appointment_details($appointment_id);
			//date_default_timezone_set('Asia/kolkata');
			$data['xyz']=array(
				'Date' => $query->date,
				'Start Time' => $query->start_time,
				'End Time' => $query->end_time,
				'Current Time ' => date("H:m:s"),
				'Current Date ' => date("Y-m-d")
				);
            $output = null;
            $data['display'] = 0;
            if($query->ispaid==0){
                $output .= 'Your have not paid for this appointment. please goto appointment list to pay.';
                $data['display'] = 0;
                $data['status'] = true;
            }else if($query->visited==1){
                $output .= " You have already consulted for this appointment. please make another appointment.";
                $data['display'] = 0;
                $data['status'] = false;
            }else if( $query->date!=date('Y-m-d') || date("H:m:s") < $query->start_time || date("H:m:s") > $query->end_time){
                $output .= "Your appointment date is scheduled on ".date('d-M-Y',strtotime($query->date));
                $output .= " Scheduled time slot is ".$query->start_time.' to '.$query->end_time;
                $data['display'] = 0;
                $data['status'] = true;
            }else if($query->appointment_type==0){
				$output .= "You have chosen clicnic consulation. Please visit clicnic.";
				$data['display'] = 0;
                $data['status'] = true;
			}else{
                $output .= 'You are ready to chat with doctor';
                $data['display'] = 1;
                $data['status'] = true;
            }
                 
            $data['message'] =$output;
            //$data['status'] = true;
        } else {
            $data['message'] = 'Please select Valid Id';
            $data['display'] = 0;
            $data['status']  = null;
        }

        echo json_encode($data);
    }
}
