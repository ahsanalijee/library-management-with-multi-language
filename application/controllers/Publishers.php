<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Publishers extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('publisher');
		$this->load->model('country');
	}

	public function index()
	{
		$data['countrys']=$this->country->countries();
		$this->load->view('publisher/publisher_add',$data);
	}
	public function save()
	{
        $data = array(  
        'publisher_name'     => $this->input->post('pname'),
        'publisher_address'     => $this->input->post('paddress'),
        'country_id'     => $this->input->post('country'),
    	);
       $ret= $this->publisher->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Publisher Added Successfully");
       	redirect("publishers");
       }
	}
	public function publishers()
	{
		$data['data']=$this->publisher->alldata();
		$this->load->view('publisher/publisher_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->publisher->singledata($id);
		$data['countrys']=$this->country->countries();
		$this->load->view('Publisher/publisher_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
            'publisher_name'     => $this->input->post('pname'),
            'publisher_address'     => $this->input->post('paddress'),
            'country_id'     => $this->input->post('country'),  
            );
		$data['id']=$this->input->post('editid');
		$this->publisher->update($data); 
		redirect('publishers/publishers');
	}
	public function delete($value='')
	{
		$this->publisher->delete($value);
		redirect("publishers/publishers");
	}
}
?>
