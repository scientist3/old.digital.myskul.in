
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Center_model extends CI_Model {

	private $table = "center";
 
	public function read_as_list($center_head_id =null)
	{
		$result= $this->db->select("center.*,cluster.cluster_name,student.firstname")
				->from($this->table)
				->join('student','center_head_id=student.user_id','left')
				->join('cluster','cluster_id=center_cluster_id','left')
				->where('center.center_head_id',$center_head_id)
				->order_by('center_name','asc')
				->get()
				->result();
		//$list['']=display('select_cluster');
		foreach($result as $row){
			$list[$row->center_id] = $row->center_name;
		}
		return $list;
	}

	public function read_by_id($center_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('center_id',$center_id)
			->get()
			->row();
	}
	
	public function student_by_center($center_id= null)
    {
        if (!empty($center_id)) {
            $query = $this->db->select('student.user_id, student.firstname as fullname')
                ->from('student')
                ->where('center_id',$center_id)
                ->get();

            $option = "<option value=\"\">".display('select_option')."</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $student) {
                    $option .= "<option value=\"$student->user_id\">$student->fullname</option>";
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = 'No student available';
                $data['status'] = false;
            }
        } else {
            $data['message'] = 'Invalid center';
            $data['status'] = null;
        }

        echo json_encode($data);
    }
}