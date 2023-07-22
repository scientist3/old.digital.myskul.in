<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ani extends CI_Controller {
    private $org_id;
    private $cluster_id;
    private $center_id;
    private $active_center_id;
    private $user_id;
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'setting_model',
            'messages/message_model',
			'dashboard_ani/center_model',
            'dashboard_ani/user_model',
			'patient_model'
        )); 
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 4)
            redirect('login');
        $this->org_id       = $this->session->userdata('org_id');
        $this->cluster_id   = $this->session->userdata('cluster_id');
        $this->user_id      = $this->session->userdata('user_id');
        $this->center_id    = $this->center_model->read_as_list($this->user_id);
        
        if (count($this->center_id)==0) {
            //top_menu_center_list
            $this->session->set_flashdata('exception', 'No center assigned yet. please contact cluster head/ organisation head/ admin.');
            $this->session->set_userdata('isLogIn','');
            redirect('login');
        }
		// If there are center associated with animator then select the first one as active.
		if(!$this->session->has_userdata('active_center_id')){
			$this->session->set_userdata('active_center_id',key($this->center_id));
		}
        $this->session->set_userdata('top_menu_center_list',$this->center_id);
        // echo $this->org_id;
        // echo $this->cluster_id;
        // print_r($this->center_id);
        if (!$this->session->has_userdata('active_center_id') ) {
            $this->session->set_flashdata('exception', 'Please select active center displayed on the top menu __^');
        }else{
            $this->active_center_id = $this->session->userdata('active_center_id');
            $centername = $this->center_model->read_by_id($this->active_center_id)->center_name;
            $this->session->set_flashdata('active_center', 'Active Center is [ '.$centername.' ]');
            //header("refresh"current_url());
        }
        //echo current_url();
    }
    public function index()
    {
        $data['title']="Animator";
        $data['user_role_list'] =$this->dashboard_model->get_user_roles();
        $data['new_messages']   = $this->message_model->new_messages_for_user($this->user_id);
        $data['total_center_alloted'] =count($this->center_id);
        $data['total_stds']     = count($this->user_model->read_by_center($this->active_center_id));
        $data['content']  = $this->load->view('dashboard_ani/home',$data,true);
        $this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
    }  
    public function center($center_id='')
    {
        if (array_key_exists($center_id, $this->center_id)) {
            $this->session->set_userdata('active_center_id',$center_id);
        }
        //$this->index();
        redirect('dashboard_ani/dashboard_ani');
    }
	public function profile()
    {  
		if ($this->session->userdata('isLogIn') == false)
			redirect('login'); 
        $data['title'] = display('profile');
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        $data['user']    = $this->dashboard_model->profile($user_id);
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['content'] = $this->load->view('dashboard_ani/profile', $data, true);
        $this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
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
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');  

        $data['title'] = display('edit_profile');
        $user_id = $this->session->userdata('user_id');
        #-------------------------------#
        $this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
        $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

        $this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");

        $this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');

        $this->form_validation->set_rules('phone', display('phone') ,'max_length[20]');
        $this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
        $this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
        $this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
        $this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'max_length[10]');
        $this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
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
            'user_id'      => $this->input->post('user_id',true),
            'firstname'    => $this->input->post('firstname',true),
            'lastname'     => $this->input->post('lastname',true),
            'designation'  => $this->input->post('designation',true),
            'department_id' => $this->input->post('department_id',true),
            'address'      => $this->input->post('address',true),
            'phone'        => $this->input->post('phone',true),
            'mobile'       => $this->input->post('mobile',true),
            'email'        => $this->input->post('email',true),
            'password'     => md5($this->input->post('password',true)),
            'short_biography' => $this->input->post('short_biography',true),
            'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
            'specialist'   => $this->input->post('specialist',true),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth',true))),
            'sex'          => $this->input->post('sex',true),
            'blood_group'  => $this->input->post('blood_group',true),
            'degree'       => $this->input->post('degree',true),
            'created_by'   => $this->session->userdata('user_id'),
            'create_date'  => date('Y-m-d'),
            'status'       => $this->input->post('status',true),
        ]; 
        #-------------------------------#
        if ($this->form_validation->run() === true) {

            if ($this->dashboard_model->update($postData)) {
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
            redirect('dashboard_ani/dashboard_ani/profile/');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->dashboard_model->profile($user_id); 
			$data['user_role_list']=$this->dashboard_model->get_user_roles();
            $data['content'] = $this->load->view('profile',$data,true);
			$this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
        } 
    }
}
