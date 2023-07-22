<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

	private $table = "patient";
 
 	public function check_user($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where('patient_id',$data['patient_id'])
			->where('phone',$data['phone'])
			->where('status',1)
			->get();
	}
	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','desc')
			->get()
			->result();
	} 
 	
	public function read_as_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->order_by('firstname','asc')
			->get()
			->result();
		$list['']=display('select_patient');
		foreach($result as $row){
			$list[$row->patient_id] = $row->patient_id." - ".$row->firstname;
		}
		return $list;
	}
	
 	public function read_by_center($centerid =null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('center',$centerid)
			->order_by('id','desc')
			->get()
			->result();
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	}
	
	public function read_by_patient_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('patient_id',$id)
			->get()
			->row();
	}
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function total_patients(){
		return $this->db->where('status','1')
			->from($this->table)
			->count_all_results();
	}
}
