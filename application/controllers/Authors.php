<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Authors extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('author');
	}
	public function index()
	{
		$this->load->view('Author/author_add');
	}
	public function save()
	{
        $data = array(  
        'author_name'     => $this->input->post('subject')
    	);
       $ret= $this->author->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Author Added Successfully");
       	redirect("authors");
       }
	}
	public function authors()
	{
		$data['data']=$this->author->alldata();
		$this->load->view('author/author_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->author->singledata($id);
		$this->load->view('author/author_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
            'author_name'     => $this->input->post('subject')  
            );
		$data['id']=$this->input->post('editid');
		$this->author->update($data); 
		redirect('authors/authors');
	}
	public function delete($value='')
	{
		$this->author->delete($value);
		redirect("authors/authors");
	}
}
?>
