<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Subjects extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('subject');
	}
	public function index()
	{
		$this->load->view('subject/subject-add');
	}
	public function save()
	{
        $data = array(  
        'subject_name'     => $this->input->post('subject')
    	);
       $ret= $this->subject->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Subject Added Successfully");
       }else{
       	$this->session->set_flashdata('error',"Subject Already Exists");
       }
       redirect("subjects");
	}
	public function subjects()
	{
		$data['data']=$this->subject->alldata();
		// print_r($data);
		// exit();
		$this->load->view('subject/subject-all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->subject->singledata($id);
		$this->load->view('Subject/subject_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
            'subject_name'     => $this->input->post('subject')  
            );
		$data['id']=$this->input->post('editid');
		$this->subject->update($data); 
		redirect('subjects/subjects');
	}
	public function delete($value='')
	{
		$this->subject->delete($value);
		redirect("Subjects/subjects");
	}
	
}
?>
