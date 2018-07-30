<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function countries()
	{
		return $this->db->get('country')->result();
	}
	public function get_country($id)
	{
		return $q= $this->db->from('country')->where("country_id",$id)->get()->result();
	}
}
?>