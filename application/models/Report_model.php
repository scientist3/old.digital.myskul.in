<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
 
	private $table = "report";


	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}


	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->join('patient','report.r_patient_id= patient.patient_id','left')
			->order_by('r_date','desc')
			->get()
			->result();
	}

	public function read_by_patient_id($patient_id)
	{	
		return $this->db->select("*")
			->from($this->table)
			->where('r_patient_id',$patient_id)
			->order_by('r_date','desc')
			->get()
			->result();
	}
	
	public function read_by_id($id)
	{	
		return $this->db->select("*")
			->from($this->table)
			->where('r_id',$id)
			->get()
			->row();
	}
	
	public function update($data = [])
	{
		return $this->db->where('r_id',$data['r_id'])
						->update($this->table,$data); 
	} 


	public function delete($id = null)
	{
		$this->db->where('r_id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function total_reports(){
		return $this->db->where('r_status','1')
			->from($this->table)
			->count_all_results();
	}
}
