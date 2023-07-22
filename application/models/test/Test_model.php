<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

	public function db_list()
	{
		$dbs = $this->dbutil->list_databases();
		$db_list[]='';
		/*foreach ($dbs as $db)
		{
		       $db_list=$db;
		}*/
		return $dbs;
	}

	public function tbl_list($db_name='')
	{
		$x=$this->db->database;
		$this->db->db_select($db_name);
		$tables = $this->db->list_tables();
		$f[]='';
		foreach ($tables as $key => $value) {
			$f[$value]=$this->field_list($value);
		}
		$this->db->db_select($x);
		return $f;//$tables;
	}
	public function db_list_with_tbl_list()
	{
		$dbs = $this->dbutil->list_databases();
		$db_list_w_t[]='';
		foreach ($dbs as $key => $value)
		{
		       $db_list_w_t[$value]=$this->tbl_list($value);
		}
		return $db_list_w_t;
	}
	public function field_list($tbl='')
	{
		$fields = $this->db->list_fields($tbl);
		$fd[]='';
		foreach ($fields as $key => $value) {
			//$fd[$value]=$this->fields_data($tbl);
		}
		return $fd;//$fields;
	}
	public function fields_data($tbl='')
	{
		return $fields = $this->db->field_data($tbl);
	}

	public function curr_db($value='')
	{
		return $this->db->database;
	}
}