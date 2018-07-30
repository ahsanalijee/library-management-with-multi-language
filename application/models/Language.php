<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function languages()
	{
		return $this->db->get('languages')->result();
	}
	public function get_country($id)
	{
		return $q= $this->db->from('languages')->where("language_id",$id)->get()->result();
	}
}
?>