<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Books extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('book');
		$this->load->model('subject');
		$this->load->model('publisher');
		$this->load->model('author');
		$this->load->model('language');
		$this->load->model('country');
	}

	public function index()
	{
		$data['subjects']=$this->subject->alldata();
		$data['publishers']=$this->publisher->alldata();
		$data['authors']=$this->author->alldata();
		$data['languages']=$this->language->languages();
		$data['countrys']=$this->country->countries();
		$this->load->view('books/book_add',$data);
	}
	public function save()
	{
        $data = array(  
        'book_name'     => $this->input->post('bookname'),
        'subject_id'     => $this->input->post('subject'),
        'publisher_id'     => $this->input->post('publisher'),
        'author_id'     => $this->input->post('author'),
        'isbn'     => $this->input->post('isbn'),
        'quantity'     => $this->input->post('quantity'),
        'language_id'	=>	$this->input->post('quantity'),
        'condition'	=>	$this->input->post('condition'),
        'grades'	=>	$this->input->post('grades'),
        'binding'	=>	$this->input->post('binding'),
        'pages'	=>	$this->input->post('pages'),
    	);
       $ret= $this->book->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Publisher Added Successfully");
       	redirect("books");
       }
	}
	public function books()
	{
		$data['data']=$this->book->alldata();
		$this->load->view('books/book_all',$data);
	}
	public function edit()
	{
		$data['subjects']=$this->subject->alldata();
		$data['publishers']=$this->publisher->alldata();
		$data['authors']=$this->author->alldata();
		$id=$this->uri->segment('3');
		$data['data']=$this->book->singledata($id);
		//$data['countrys']=$this->country->countries();
		$this->load->view('books/book_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'book_name'     => $this->input->post('bookname'),
        'subject_id'     => $this->input->post('subject'),
        'publisher_id'     => $this->input->post('publisher'),
        'author_id'     => $this->input->post('author'),
        'isbn'     => $this->input->post('isbn'),
        'quantity'     => $this->input->post('quantity'),
    	);
		$data['id']=$this->input->post('editid');
		$this->book->update($data); 
		redirect('books/books');
	}
	public function delete($value='')
	{
		$this->book->delete($value);
		redirect("books/books");
	}
	public function savepublisher()
	{
        $data = array(  
        'publisher_name'     => $this->input->post('pname'),
        'publisher_address'     => $this->input->post('paddress'),
        'country_id'     => $this->input->post('country'),
    	);
       $ret= $this->publisher->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Publisher Added Successfully");
       	//$this->load->view('books/book_add');
       	redirect("books");
       }
	}
	public function savesubjects()
	{
        $data = array(  
        'subject_name'     => $this->input->post('subject')
    	);
       $ret= $this->subject->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Subject Added Successfully");
       	redirect("books");
       }
	}
	public function saveauthor()
	{
        $data = array(  
        'author_name'     => $this->input->post('subject')
    	);
       $ret= $this->author->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Author Added Successfully");
       	redirect("books");
       }
	}
	
	public function single($isbn)
	{

		//$this->load->view("header");
		$res['res']=$this->book->assignedto($isbn);
		$this->load->view("books/single_book",$res);
		
	}
	
}
?>
