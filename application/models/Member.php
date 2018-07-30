<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function savedata($data)
	{
		return $this->db->insert('member',$data);
	}
	public function alldata()
	{
		$query = $this->db->get('member'); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('member')->where('member_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('member_id', $data['id']);
		$this->db->update('member', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('member', array('member_id' => $value));
	}
	public function checkmember($id)
	{
		$data=$this->db->from('member')->where('member_key',$id)->get();
		return $data->result();
	}
}
?>