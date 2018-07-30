<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('member');
		$this->load->model('borrow');
	}
	public function index()
	{
		$this->load->view('member/member_add');
	}
	public function single($id)
	{
		$data['assigns']=$this->borrow->userborrows($id);
		$data['data']=$this->member->singledata($id);
		$this->load->view('member/member_single',$data);
	}
	public function save(){
		$this->db->select_max('member_id');
	    $result= $this->db->get('member')->row_array();
	    $p=$result['member_id'];
		$id=($p+1).".". mt_rand(100, 999)."-".date('y');
        $dd=strtotime(date("Y-m-d H:m:s"));
		$expdate=date("Y-m-d H:m:s",strtotime("+1month",$dd));
		$data = array(  
        'member_name'     => $this->input->post('name'),
        'member_address'     => $this->input->post('address'),
        'member_key'	=> 	$id,
        'join_date'     => date("Y-m-d H:m:s"),
        'expiry_date'     => $expdate
    	);
       $ret= $this->member->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Member Added Successfully Member id is <strong>".$id."</strong>");
       	//$this->load->view('subject/subject-add');
       	redirect("members");
       }
	}
	public function members()
	{
		$data['data']=$this->member->alldata();
		$this->load->view('member/member_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->member->singledata($id);
		$this->load->view('member/member_edit',$data);
	}
	public function update()
	{
		
		$data['data'] = array(  
        'member_name'     => $this->input->post('name'),
        'member_address'     => $this->input->post('address')
    	);
		$data['id']=$this->input->post('editid');
		$this->member->update($data); 
		redirect('members/members');
	}
	public function delete($value='')
	{
		$this->member->delete($value);
		redirect("members/members");
	}
}
?>
