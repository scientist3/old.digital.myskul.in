	#-------------------- Member -------------------#
	
	public function members($value='') {
		$data['title'] 			= display('list_user');
		/*---------- Read Center List And District List ----------*/
		$data['user_role_list']	= $this->dashboard_model->get_user_roles();
		$data['district_list']	= $this->dashboard_model->district_list();
		//echo $org_id;
		$data['users'] 			= $this->user_model->read_members_for_coodinator($this->org_id,$this->cluster_id);
		$data['content'] = $this->load->view('dashboard_ani/user/member',$data,true);
		$this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
	}

	public function create_member($value='') {
		$data['title'] = display('add_member');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$l=[];
		foreach ($data['user_role_list'] as $k => $v) {
			if ($k==4) {
				$l[$k]=$v;
			}
		}
		$data['user_role_list1']= $l;
		$data['district_list']=$this->dashboard_model->district_list();
		$data['center_list'] = $this->center_model->read_as_list($this->org_id,$this->cluster_id);
		//$data['cluster_list']		= $this->cluster_model->read_as_list_by_org($this->org_id);
        $id = $this->input->post('user_id');
        
		#-------------------------------#
		$this->form_validation->set_rules('firstname', 	display('first_name'),	'required|max_length[50]');
		$this->form_validation->set_rules('email', 		display('email'),		'required|callback_email_check['.$this->input->post('user_id').']');
		$this->form_validation->set_rules('mobile', 	display('mobile'),		'required|numeric|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('age', 		display('age'),			'numeric');
		// $this->form_validation->set_rules('user_role',	display('user_role'),	'required');
		$this->form_validation->set_rules('sex', 		display('sex'),			'required');
		//$this->form_validation->set_rules('cluster_idd',display('cluster_name'),'required');
		//$this->form_validation->set_rules('password', 		display('password'),	'required|max_length[32]|md5');
		//$this->form_validation->set_rules('district', 		display('district'),	'required');
		//$this->form_validation->set_rules('block', 			display('block'),		'alpha');
		//$this->form_validation->set_rules('village', 		display('village'),		'alpha');
		//$this->form_validation->set_rules('school_type', 	display('school_type'),	'alpha');
		//$this->form_validation->set_rules('school_level', 	display('school_level'),'max_length[13]');
		//$this->form_validation->set_rules('school_name', 	display('school_name'),	'max_length[13]');
		//$this->form_validation->set_rules('sex', 			display('sex'),			'required|max_length[10]');
		//$this->form_validation->set_rules('address', 		display('address'),		'required|max_length[255]');
		//$this->form_validation->set_rules('status', 		display('status'),		'required');

		//picture upload
        $picture = $this->fileupload->do_upload(
            'siteassets/images/staff/',
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
		
		// user_id	firstname	mobile	email	password	user_role	picture	district	block	village	school_type	school_level	school_name	sex	age	class	school_status	father_name	father_occup	mother_name	mother_occup	socail_status	center_id remarks	created_by	create_date	update_date	status

		#-------------------------------#//create a patient
		if ($id == null) { 
			$data['student'] = (object)$postData = [
				'user_id'		=> $this->input->post('user_id'),
				'firstname'		=> $this->input->post('firstname',true),
				'mobile'		=> $this->input->post('mobile',true),
				'email'			=> /*"std".$this->randStrGen(3,4)."@gmail.com",// */ $this->input->post('email'),
				'user_role'		=> '4',
				'picture'      	=> (!empty($picture)?$picture:$this->input->post('old_picture')),
				'password'		=> md5($this->input->post('mobile')),
				'district'		=> $this->input->post('district'),
				'block'			=> $this->input->post('block'),
				'village'		=> $this->input->post('village'),
				'age'			=> $this->input->post('age'),
				'sex'			=> $this->input->post('sex'),
				'org_idd'		=> $this->org_id,
				'cluster_idd'	=> $this->cluster_id,
				'center_id'		=> $this->input->post('center_id'),
				'created_by'   	=> $this->session->userdata('user_id'),
				'create_date' 	=> date('Y-m-d'),
				'update_date' 	=> '',//$this->input->post('update_date'),
				'status'       	=> 1 //$this->input->post('status')
				/*'school_type'	=> $this->input->post('school_type'),
				'school_level'	=> $this->input->post('school_level'),
				'school_name'	=> $this->input->post('school_name'),
				'class'			=> $this->input->post('class'),
				'school_status'	=> $this->input->post('school_status'),
				'father_name'	=> $this->input->post('father_name'),
				'father_occup'	=> $this->input->post('father_occup'),
				'mother_name'	=> $this->input->post('mother_name'),
				'mother_occup'	=> $this->input->post('mother_occup'),
				'center_id'		=> $this->input->post('center_id'),
				'remarks'		=> $this->input->post('remarks'),
				'socail_status'	=> $this->input->post('socail_status'),*/
			]; // update patient
		} else { 
			$data['student'] = (object)$postData = [
				'user_id'		=> $this->input->post('user_id'),
				'firstname'		=> $this->input->post('firstname',true),
				'mobile'		=> $this->input->post('mobile',true),
				'email'			=> /*"std".$this->randStrGen(3,4)."@gmail.com",// */ $this->input->post('email'),
				'user_role'		=> '4',
				'picture'      	=> (!empty($picture)?$picture:$this->input->post('old_picture')),
				'password'		=> md5($this->input->post('mobile')),
				'district'		=> $this->input->post('district'),
				'block'			=> $this->input->post('block'),
				'village'		=> $this->input->post('village'),
				'age'			=> $this->input->post('age'),
				'sex'			=> $this->input->post('sex'),
				'org_idd'		=> $this->org_id,
				'cluster_idd'	=> $this->cluster_id,
				'center_id'		=> $this->input->post('center_id'),
				'created_by'   	=> $this->session->userdata('user_id'),
				'create_date' 	=> date('Y-m-d'),
				'update_date' 	=> '',//$this->input->post('update_date'),
				'status'       	=> 1 //$this->input->post('status')
				/*'school_type'	=> $this->input->post('school_type'),
				'school_level'	=> $this->input->post('school_level'),
				'school_name'	=> $this->input->post('school_name'),
				'class'			=> $this->input->post('class'),
				'school_status'	=> $this->input->post('school_status'),
				'father_name'	=> $this->input->post('father_name'),
				'father_occup'	=> $this->input->post('father_occup'),
				'mother_name'	=> $this->input->post('mother_name'),
				'mother_occup'	=> $this->input->post('mother_occup'),
				'center_id'		=> $this->input->post('center_id'),
				'remarks'		=> $this->input->post('remarks'),
				'socail_status'	=> $this->input->post('socail_status'),*/
			]; 
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($postData['user_id'])) {
				if ($this->user_model->create($postData)) {
					$u_id = $this->db->insert_id();
					/*$user=$data['patient']->std_id;
					$numb=$postData['phone'];
					$response =$this->sms_model->send_sms($numb,'Welcome to Valley Diagnostic Centre. Your userid and password has been generated. Your userid='.$user.' and password= <YourPhoneNumber>.');*/
					#set success message
					$this->session->set_flashdata('message', $response.display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_ani/user/user_profile/' . $u_id);
			} else {
				if ($this->user_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_ani/user/user_edit/'.$postData['user_id']);
			}
		} else {
			$data['content'] = $this->load->view('dashboard_ani/user/member_form',$data,true);
			$this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
		}
	}

	public function email_check($email, $id) { 
        $emailExists = $this->db->select('email')
            ->where('email',$email) 
            ->where_not_in('user_id',$id) 
            ->get('student')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }

    public function user_profile($user_id = null) { 
		$data['title'] =  display('user_info');
		#-------------------------------#
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$data['profile'] = $this->user_model->read_user_by_id($user_id);
		$data['content'] = $this->load->view('dashboard_ani/user/user_profile',$data,true);
		$this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
	}

	public function user_edit($user_id = null) { 
		$data['title'] = display('user_edit');
		$data['user_role_list']=$this->dashboard_model->get_user_roles();
		$l=[];
		foreach ($data['user_role_list'] as $k => $v) {
			if ($k!=5 && $k !=1&& $k !=2) {
				$l[$k]=$v;
			}
		}
		$data['user_role_list1']= $l;
		$data['district_list']	=$this->dashboard_model->district_list();
		$data['center_list'] = $this->center_model->read_as_list($this->org_id,$this->cluster_id);
		// $data['center_list'] 	=$this->center_model->read_as_list();
		// $data['cluster_list']	= $this->cluster_model->read_as_list_by_org($this->organisation->org_id);
		#-------------------------------#
		//$data['patient'] = $this->patient_model-$data['user_role_list']=$this->dashboard_model->get_user_roles();
		//$data['district_list']=$this->dashboard_model->district_list();
		//$data['center_list'] =$this->center_model->read_as_list();
		$data['student'] = $this->user_model->read_user_by_id($user_id);
		$data['content'] = $this->load->view('dashboard_ani/user/member_form',$data,true);
		$this->load->view('dashboard_ani/layout/main_wrapper_lte',$data);
	}
 
	public function user_delete($user_id = null) {
		if ($this->user_model->delete($user_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard_ani/user/members');
	}

		
	public function read_by_role_as_list_for_message($user_role= null,$self_user_id = null,$org_id=null)
	{
		if ($user_role==null) {
			if ($org_id ==null) {
				$result = $this->db->select('user_id, firstname AS fullname')
						->from($this->table)
						//->where('user_role',$user_role)
						->where_not_in('user_id', $self_user_id)
						->order_by('fullname', 'asc')
						->get()
						->result();
			}else{
				$result = $this->db->select('user_id, firstname AS fullname')
						->from($this->table)
						->where('org_idd',$org_id)
						->where_not_in('user_id', $self_user_id)
						->order_by('fullname', 'asc')
						->get()
						->result();
			}
		}else{
			$result = $this->db->select('user_id, firstname AS fullname')
						->from($this->table)
						->where('user_role',$user_role)
						->where_not_in('user_id', $self_user_id)
						->order_by('fullname', 'asc')
						->get()
						->result();
		}
		$list[''] = display('select_user');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->user_id] = $value->fullname; 
			}
			return $list;
		} else {
			return false;
		}
	}
	public function user_by_role_as_list_for_coordinator_nojson($user_role= null,$self_user_id = null,$org_id=null,$cluster_id= null)
	{
		$list[''] = display('select_user');

		$query = $this->db->select('user_id, firstname AS fullname')
					->from('organisation')
					->join('student','student.user_id= organisation.org_head_id')
					->where('org_id',$org_id)
					->order_by('fullname', 'asc')
					->get()->result();
		if (!empty($query)) {
			foreach ($query as $value) {
				$list[$value->user_id] = $value->fullname; 
			}
		}

    	$query1 = $this->db->select('user_id, firstname AS fullname')
					->from($this->table)
					->where('user_role','4')
					->where('cluster_idd',$cluster_id)
					->or_where('user_role','5')
					->where('cluster_idd',$cluster_id)
					//->where_not_in('user_id', $self_user_id)
					//->where('org_idd',$org_id)
					->order_by('fullname', 'asc')
					->get()->result();	
    	
		if (!empty($query1)) {
			foreach ($query1 as $value) {
				$list[$value->user_id] = $value->fullname; 
			}
		}

		if (count($list)) {
			return $list;
		} else {
			return false;
		}
	}
	public function user_by_role_as_list($user_role= null,$self_user_id=null,$org_id=null, $cluster_id= null )
    {
        //$department_id = $this->input->post('department_id');

        if (!empty($user_role)) {
        	// When user role is organisation
        	if($user_role==2){
        		$query = $this->db->select('user_id, firstname AS fullname')
						->from($this->table)
						->where('user_role',$user_role)
						->where_not_in('user_id', $self_user_id)
						//->where('org_idd',$org_id)
						->order_by('fullname', 'asc')
						->get();
        	}else{
        		$query = $this->db->select('user_id, firstname AS fullname')
						->from($this->table)
						->where('user_role',$user_role)
						->where_not_in('user_id', $self_user_id)
						->where('org_idd',$org_id)
						->order_by('fullname', 'asc')
						->get();	
        	}
            

            $option = "<option value=\"\">".display('select_option')."</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $user) {
                    $option .= "<option value=\"$user->user_id\">$user->fullname</option>";
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = 'No user available';
                $data['status'] = false;
            }
        } else {
            $data['message'] = 'Invalid user group';
            $data['status'] = null;
        }

        echo json_encode($data);
    }
    public function user_by_role_as_list_for_coordinator($user_role= null,$self_user_id=null,$org_id=null, $cluster_id= null )
    {
        //$department_id = $this->input->post('department_id');

        if (!empty($user_role)) {
        	// When user role is organisation
        	if($user_role==2){
        		$query = $this->db->select('user_id, firstname AS fullname')
						->from('organisation')
						->join('student','student.user_id= organisation.org_head_id')
						->where('org_id',$org_id)
						->order_by('fullname', 'asc')
						->get();
        	}else{
        		$query = $this->db->select('user_id, firstname AS fullname')
						->from($this->table)
						->where('user_role',$user_role)
						->where_not_in('user_id', $self_user_id)
						->where('org_idd',$org_id)
						->where('cluster_idd',$cluster_id)
						->order_by('fullname', 'asc')
						->get();	
        	}
            

            $option = "<option value=\"\">".display('select_option')."</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $user) {
                    $option .= "<option value=\"$user->user_id\">$user->fullname</option>";
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = 'No user available';
                $data['status'] = false;
            }
        } else {
            $data['message'] = 'Invalid user group';
            $data['status'] = null;
        }

        echo json_encode($data);
    }
 	public function read_stds_aco($std_id =null)
 	{
 		$animator = $this->db->select("st.user_id,st.firstname")
			->from($this->table)
			->where('student.user_id',$std_id)
			->join('center','center.center_id=student.center_id')
			->join('student as st','st.user_id = center.center_head_id')
			->order_by('user_id','desc')
			->get()
			->row()->user_id;
		$coodinator = $this->db->select("st2.user_id, st2.firstname")
			->from($this->table)
			->where('student.user_id',$std_id)
			->join('center','center.center_id=student.center_id')
			->join('cluster','cluster.cluster_id=center.center_cluster_id') 
			->join('student as st2','st2.user_id = cluster.cluster_head_id')
			->order_by('user_id','desc')
			->get()
			->row()->user_id;
		
		$org = $this->db->select("st2.user_id, st2.firstname")
			->from($this->table)
			->where('student.user_id',$std_id)
			->join('center','center.center_id=student.center_id')
			->join('cluster','cluster.cluster_id=center.center_cluster_id')
			->join('organisation','organisation.org_id=cluster.cluster_org_id')
			->join('student as st2','st2.user_id = organisation.org_head_id')
			->order_by('user_id','desc')
			->get()
			->row()->user_id;
		//echo $animator;die();
		//echo $coodinator;die();
		//echo $org;die();
		return array($animator, $coodinator, $org );
 	}
	public function read_as_list_org()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('user_role','2')
			->order_by('firstname','asc')
			->get()
			->result();
		$list['']=display('select_user');
		foreach($result as $row){
			$list[$row->user_id] = $row->firstname;
		}
		return $list;
	}

	public function read_as_list_cor()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('user_role','3')
			->order_by('firstname','asc')
			->get()
			->result();
		$list['']=display('select_user');
		foreach($result as $row){
			$list[$row->user_id] = $row->firstname;
		}
		return $list;
	}

	public function read_as_list_ani()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('user_role','4')
			->order_by('firstname','asc')
			->get()
			->result();
		$list['']=display('select_user');
		foreach($result as $row){
			$list[$row->user_id] = $row->firstname;
		}
		return $list;
	}