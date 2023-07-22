<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_cor extends CI_Controller {
    private $org_id;
    private $cluster_id;
    private $user_id;
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'setting_model',
            'organisation_model',
			'cluster_model',
			'center_model',
            'messages/message_model',
            'user_model'
        )); 
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 3)
            redirect('login');
        $this->org_id       = $this->session->userdata('org_id');
        $this->cluster_id   = $this->session->userdata('cluster_id');
        $this->user_id      = $this->session->userdata('user_id');

        if (empty($this->cluster_id)) {
            //$this->session->set_flashdata('exception','<h2>Cluster not assigned yet. Please Contact organisation head/admin.</h2>');
            redirect('login/logout');
        }
    }
    public function index()
    {
        $data['title']="Cluster Head";
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        // $data['new_messages'] =$this->contactus_model->new_messages();
        // $data['total_messages'] =$this->contactus_model->total_messages();
        // $data['total_reports'] =$this->report_model->total_reports();
        // $data['total_patients'] =$this->patient_model->total_patients();

        // $data['total_clusters']     =$this->cluster_model->total_clusters_of_org($this->organisation->org_id);
        $data['total_centers']          = count($this->center_model->read($this->org_id,$this->cluster_id));
        $data['total_animators']        = count($this->user_model->read_members_for_coodinator($this->org_id,$this->cluster_id));
        $data['total_students']         = count($this->user_model->read_students($this->org_id,$this->cluster_id));
        $data['new_messages']           = $this->message_model->new_messages_for_user($this->user_id);
        // print_r($this->session->userdata());
        // if (empty($this->cluster_id)) {
        //     $this->session->set_flashdata('message','You dont have any cluster assigned. Please Contact organisation head/admin.');
        // }
        $data['content']  = $this->load->view('dashboard_cor/home',$data,true);
        $this->load->view('dashboard_cor/layout/main_wrapper_lte',$data);
    }  

	public function profile()
    {   
        $data['title'] = display('profile');
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        //$data['user']    = $this->dashboard_model->profile($user_id);
        $data['user']    = $this->user_model->read_user_by_id($user_id);
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['content'] = $this->load->view('dashboard_cor/profile', $data, true);
        $this->load->view('dashboard_cor/layout/main_wrapper_lte',$data);
    }

    public function email_check($email, $user_id)
    { 
        $emailExists = $this->db->select('email')
            ->where('email',$email) 
            ->where_not_in('user_id',$user_id) 
            ->get('user')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }

	// Profile Edit
    public function form()
    {
        $data['title'] = display('edit_profile');
        $user_id = $this->session->userdata('user_id');
        #-------------------------------#
        $this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
        // $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

        $this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");

        $this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');

        $this->form_validation->set_rules('phone', display('phone') ,'max_length[20]');
        $this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
        $this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
        $this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
        $this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'max_length[10]');
        //$this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
        $this->form_validation->set_rules('status',display('status'),'required');
        #-------------------------------#
        //picture upload
        $picture = $this->fileupload->do_upload(
            'uploads/admin/profilepic/',
            'picture'
        );
        // if picture is uploaded then resize the picture
        if ($picture !== false && $picture != null) {
            $this->fileupload->do_resize(
                $picture, 
                200,
                200
            );
        }
        //if picture is not uploaded
        if ($picture === false) {
            $this->session->set_flashdata('exception', display('invalid_picture'));
        }
        #-------------------------------# 
        $data['user'] = (object)$postData = [
            'user_id'       => $this->input->post('user_id'),
            'firstname'     => $this->input->post('firstname',true),
            'mobile'        => $this->input->post('mobile',true),
            'email'         => /*"std".$this->randStrGen(3,4)."@gmail.com",// */ $this->input->post('email'),
            //'user_role'     => $this->input->post('user_role'),
            'picture'       => (!empty($picture)?$picture:$this->input->post('old_picture')),
            'password'      => md5($this->input->post('password')),
            'district'      => $this->input->post('district'),
            'block'         => $this->input->post('block'),
            'village'       => $this->input->post('village'),
            'age'           => $this->input->post('age'),
            'sex'           => $this->input->post('sex'),
            'update_date'   => date('Y-m-d')
        ];
        //$data['student'] = (object)$postData;
        #-------------------------------#
        if ($this->form_validation->run() === true) {

            if ($this->user_model->update($postData)) {
                #set success message
                $this->session->set_flashdata('message',display('update_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception', display('please_try_again'));
            }

            //update profile picture
            if ($postData['user_id'] == $this->session->userdata('user_id')) {                  
                $this->session->set_userdata([
                    'picture'   => $postData['picture'],
                    'fullname'  => $postData['firstname'].' '.$postData['lastname']
                ]); 
            }
            redirect('dashboard_cor/dashboard_cor/profile/');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->dashboard_model->profile($user_id); 
            $data['user_role_list']=$this->dashboard_model->get_user_roles();
            $data['content'] = $this->load->view('dashboard_cor/profile',$data,true);
            $this->load->view('dashboard_cor/layout/main_wrapper_lte',$data);
        } 
    }
}
