<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibrarianModal extends CI_Model{

	public function login($data)
	{
		$data=$this->db->get_where('librarian', $data);
		return $data->result();
	}
}
?>