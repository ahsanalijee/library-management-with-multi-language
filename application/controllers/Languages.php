<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Languages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('language');
	}
	public function index()
	{
		$this->load->view('language/language_add');
	}
	public function save()
	{
        $data = array(  
        'subject_name'     => $this->input->post('subject')
    	);
    	// print_r($data);
    	// exit();
       $ret= $this->language->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Subject Added Successfully");
       	//$this->load->view('subject/subject-add');
       	redirect("subjects");
       }
	}
	public function subjects()
	{
		$data['data']=$this->language->alldata();
		// print_r($data);
		// exit();
		$this->load->view('language/language_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->language->singledata($id);
		$this->load->view('language/language_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
            'subject_name'     => $this->input->post('subject')  
            );
		$data['id']=$this->input->post('editid');
		$this->language->update($data); 
		redirect('languages/languages');
	}
	public function delete($value='')
	{
		$this->language->delete($value);
		redirect("languages/languages");
	}

}
	