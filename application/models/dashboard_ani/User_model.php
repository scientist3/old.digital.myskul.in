<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "student";
 
	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}

	public function read_students($org_id = null, $cluster_id= null)
	{
		if ($cluster_id != null) {
			return $this->db->select("student.*, center.center_name")
				->from($this->table)
				->where('user_role','5')
				->where('org_idd',$org_id)
				->where('cluster_idd',$cluster_id)
				->join('center','center.center_id=student.center_id','left')
				->order_by('user_id','desc')
				->get()
				->result();
		}else{
			return $this->db->select("student.*, center.center_name")
				->from($this->table)
				->where('user_role','5')
				->where('org_idd',$org_id)
				->join('center','center.center_id=student.center_id','left')
				->order_by('user_id','desc')
				->get()
				->result();		
		}
	}
	
	public function read_std_center_id($std_id='')
	{
		return $this->db->select("student.center_id, center.center_name")
			->from($this->table)
			->where('student.user_id',$std_id)
			->join('center','center.center_id=student.center_id')
			//->join('student as st','st.user_id = center.center_head_id')
			//->order_by('user_id','desc')
			->get()
			->row();
	}
 	
 	public function read_by_center($center_id =null)
	{
		return $this->db->select("student.*,center.center_name")
			->from($this->table)
			->where('user_role','5')
			->where('student.center_id',$center_id)
			->join('center','center.center_id=student.center_id','left')
			->order_by('firstname','desc')
			->get()
			->result();
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("student.*, center.center_name")
			->from($this->table)
			->where('user_id',$id)
			->join('center','center.center_id=student.center_id','left')
			->order_by('user_id','desc')
			->get()
			->row();
	} 

	public function read_user_by_id($user_id = null)
	{
		return $this->db->select("student.*")
			->from($this->table)
			->where('user_id',$user_id)
			//->join('center','center.center_id=student.center_id')
			//->order_by('user_id','desc')
			->get()
			->row();
	}
 	public function user_by_role_as_list_for_coordinator_nojson($user_role= null,$self_user_id = null,$org_id=null,$cluster_id= null,$center_id = null)
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
					->where('user_role','3')
					->where('cluster_idd',$cluster_id)
					//->where('center_id',$center_id)
					->or_where('user_role','5')
					->where('cluster_idd',$cluster_id)
					//->where('center_id',$center_id)
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
	public function update($data = [])
	{
		return $this->db->where('user_id',$data['user_id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null)
	{
		$this->db->where('user_id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function total_users($user_role= null)
	{
		return $this->db->where('user_role',$user_role)
			->from($this->table)
			->count_all_results();
	}

	public function total_animators_of_org($org_id= null)
	{
		$d2 = $this->db->select('*')
						->from($this->table)
						->where('user_role','4')
						->where('org_idd',$org_id)
						->count_all_results();
		return $d2;
	}

	public function total_students_of_org($org_id= null)
	{
		$d2 =  $this->db->select("student.*, center.center_name")
			->from($this->table)
			->where('user_role','5')
			->where('org_idd',$org_id)
			->join('center','center.center_id=student.center_id','left')
			->count_all_results();
		return $d2;
	}
}
