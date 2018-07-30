<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fine extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function addfine($data)
	{
		$this->db->insert('fine', $data);
	}
}
?>
