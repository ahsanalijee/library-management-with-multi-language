<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function savedata($data)
	{
		return $this->db->insert('borrowed',$data);
	}
	public function alldata()
	{
		$query = $this->db->select("*,librarian.name As libname")->from('borrowed')->join('member', 'member.member_id = borrowed.member_id')->join('librarian', 'librarian.librarian_id = borrowed.librarian_id')->join('books', 'books.book_id = borrowed.book_id')->where("borrowed.status !=",'1')->get(); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$query = $this->db->select("*,librarian.name As libname")->from('borrowed')->join('member', 'member.member_id = borrowed.member_id')->join('librarian', 'librarian.librarian_id = borrowed.librarian_id')->join('books', 'books.book_id = borrowed.book_id')
		->where('borrowed_id',$value)->get();
		return $query->result();
	}
	public function update($data)
	{
		$this->db->where('borrowed_id', $data['id']);
		$this->db->update('borrowed', $data['data']);
	}
	public function delete($value)
	{
		$this->db->delete('borrowed', array('borrowed_id' => $value));
	}
	public function returned($value='',$book)
	{
		$data = array(
			'status' => 1,
			'return_date' =>date('Y-m-d H:m:s')
		);
		$this->db->where('borrowed_id', $value);
		$this->db->update('borrowed', $data);
		$da = array(
			'book_status' => 0
		);
		$this->db->where('book_id', $book);
		$this->db->update('books', $da);
	}
	public function userborrows($value='')
	{
		$query = $this->db->select("*,librarian.name As libname")->from('borrowed')->join('member', 'member.member_id = borrowed.member_id')->join('librarian', 'librarian.librarian_id = borrowed.librarian_id')->join('books', 'books.book_id = borrowed.book_id')
		->where('borrowed.member_id',$value)->order_by('borrowed.borrowed_id', 'DESC')->get();
		return $query->result();
	}
}
?>