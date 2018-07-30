<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function savedata($data)
	{
		return $this->db->insert('books',$data);
	}
	public function alldata()
	{
		$query = $this->db->from('books')->join('subject', 'subject.subject_id = books.subject_id')->join('publisher', 'publisher.publisher_id = books.publisher_id')->join('author', 'author.author_id = books.author_id')->get(); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('books')->
		join('subject', 'subject.subject_id = books.subject_id')->
		join('publisher', 'publisher.publisher_id = books.publisher_id')->
		join('author', 'author.author_id = books.author_id')->
		where('book_id',$value)->
		get();
		return $data->result();
	}
	public function update($data)
	{
		
		$this->db->where('book_id', $data['id']);
		$this->db->update('books', $data['data']);
	}
	public function delete($value)
	{
		$this->db->delete('books', array('book_id' => $value));
	}
	public function checkisbn($isbn)
	{
		$data=$this->db->select("*")->from('books')->
		join('subject', 'subject.subject_id = books.subject_id')->
		join('publisher', 'publisher.publisher_id = books.publisher_id')->
		join('author', 'author.author_id = books.author_id')->
		join('languages', 'languages.language_id = books.language_id')->
		where('isbn',$isbn)->
		get();
		return $data->result();
		// echo "<pre>";
		// print_r($data->result());
		// exit();
		//return $query = $this->db->get_where('books', array('isbn' => $isbn))->result();
	}
	public function assignedto($isbn)
	{
		$data=$this->db->select("*")->from('books')->
		join('subject', 'subject.subject_id = books.subject_id')->
		join('publisher', 'publisher.publisher_id = books.publisher_id')->
		join('author', 'author.author_id = books.author_id')->
		join('languages', 'languages.language_id = books.language_id')->
		join('borrowed', 'borrowed.book_id = books.book_id AND borrowed.status <>1',"left")->
		join('member', 'borrowed.member_id = member.member_id',"left")->
		where('books.isbn',$isbn)->
		get();
		return $data->result();
		// echo $this->db->last_query();
		// echo "<pre>";
		// print_r($data->result());
		// exit();
	}
	function get_live_items($search_data) {

        $this->db->select("*");
        $this->db->from('books');
        $this->db->join('author', 'author.author_id = books.author_id');
        $this->db->join('subject', 'subject.subject_id = books.subject_id');
        $this->db->like('book_name', $search_data);
        $this->db->or_like('author_name', $search_data);
        $this->db->or_like('subject_name', $search_data);
        $this->db->limit(10);
        $this->db->order_by("book_id", 'desc');
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result();
    }
}
?>