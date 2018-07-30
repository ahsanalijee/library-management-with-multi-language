<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Model {
	public function savedata($data)
	{
		$query = $this->db->get_where('subject', $data)->result();
		// print_r($query);
		// exit();
		if (count($query)<1) {
			return $this->db->insert('subject',$data);
		}else{
			return false;
		}
		
	}
	public function alldata()
	{
		$query = $this->db->get('subject'); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('subject')->where('subject_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('subject_id', $data['id']);
		$this->db->update('subject', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('subject', array('subject_id' => $value));
	}
}
?>