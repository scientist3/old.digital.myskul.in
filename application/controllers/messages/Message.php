<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'dashboard_model',
            'messages/message_model' 
		));

        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1 ) 
            redirect('login'); 
	}
 
    public function index($sender_id =null)
    {
        $data['title']    =  display('inbox');
        $user_id = $this->session->userdata('user_id'); 
        //echo $user_id; die;
        #-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
		//$data['group_by'] = 0;
        if(!empty($sender_id)){
			$data['group_by'] = 0;
			$data['messages'] = $this->message_model->inbox_of_student($user_id, $sender_id);
		}else{
			$data['group_by'] = 1;
			$data['messages'] = $this->message_model->inbox_groupby_sender($user_id);
		}
        $data['content']  = $this->load->view('messages/inbox' ,$data,true);
        $this->load->view('dashboard_std/layout/main_wrapper_lte',$data);
    } 
	public function reply($receiver_id = null){
		$this->session->set_userdata('receiver_id',$receiver_id);
		redirect('messages/message/new_message');
	}
	public function sent($patient_id =null)
	{
        $data['title']    =  display('sent');
        $user_id = $this->session->userdata('user_id'); 
		#-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
		if(!empty($patient_id)){
			$data['group_by'] = 0;
			$data['messages'] = $this->message_model->sent_of_patient($user_id, $patient_id);
		}else{
			$data['group_by'] = 1;
			$data['messages'] = $this->message_model->sent_groupby_patient($user_id);
		}
		$data['content'] = $this->load->view('messages/sent' ,$data,true);
		$this->load->view('dashboard_std/layout/main_wrapper_lte',$data);
	} 

    public function inbox_information($id = null, $sender_id = null)
    {  
        $data['title'] = display('messages');
        $receiver_id = $this->session->userdata('user_id'); 
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
        $data['content'] = $this->load->view('messages/inbox_information',$data,true);
        $this->load->view('dashboard_std/layout/main_wrapper_lte',$data);
    }

    public function sent_information($id = null, $receiver_id = null)
    {  
        $data['title'] = display('messages');
        $sender_id = $this->session->userdata('user_id'); 
        #-------------------------------#
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['message'] = $this->message_model->sent_informationp($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('messages/sent_information',$data,true);
        $this->load->view('layout/main_wrapper_lte',$data);
    }
 

    public function new_message()
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('receiver_id', display('receiver_name') ,'required|max_length[11]');
        //$this->form_validation->set_rules('subject', display('subject'),'required|max_length[255]');
        $this->form_validation->set_rules('message', display('message'),'required|trim');
        /*-------------STORE DATA------------*/
        $user_id = $this->session->userdata('user_id');
        $date    = $this->input->post('date');

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
            redirect('messages/message/new_message');
        } else {
            $data['title'] = display('new_message');
            $data['user_role_list']=$this->dashboard_model->get_user_roles();
            $data['user_list'] = $this->message_model->patient_list();
            $data['content'] = $this->load->view('messages/new_message',$data,true);
            $this->load->view('dashboard_std/layout/main_wrapper_lte',$data);
        }  
    }
 

    public function delete($id = null, $sender_id = null, $receiver_id = null) 
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
            //$file_path = 'siteassets/images/message/'.$this->session->userdata('patient_id').'/';
            $file_path = 'siteassets/images/message/Admin/';
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
}
