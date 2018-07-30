<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}public function savedata($data)
	{
		return $this->db->insert('author',$data);
	}
	public function alldata()
	{
		$query = $this->db->get('author'); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('author')->where('author_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('author_id', $data['id']);
		$this->db->update('author', $data['data']);
	// echo $this->db->get_compiled_update();
	// echo "<pre>";
	// 	print_r($this->db->last_query());
	// 	exit();
	}
	public function delete($value='')
	{
		$this->db->delete('author', array('author_id' => $value));
	}
}

?>