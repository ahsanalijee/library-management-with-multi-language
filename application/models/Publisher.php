<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publisher extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function savedata($data)
	{
		return $this->db->insert('publisher',$data);
	}
	public function alldata()
	{
		$query = $this->db->from('publisher')->join('country', 'country.country_id = publisher.country_id')->get(); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('publisher')->where('publisher_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('publisher_id', $data['id']);
		$this->db->update('publisher', $data['data']);
	// echo $this->db->get_compiled_update();
	// echo "<pre>";
	// 	print_r($this->db->last_query());
	// 	exit();
	}
	public function delete($value)
	{
		$this->db->delete('publisher', array('publisher_id' => $value));
	}
}
?>