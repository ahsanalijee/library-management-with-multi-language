<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Borrows extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('book');
		$this->load->model('member');
		$this->load->model('borrow');
		$this->load->model('fine');
	}

	public function index()
	{
		$data['books']=$this->book->alldata();
		$data['members']=$this->member->alldata();
		$this->load->view('borrow/assign',$data);
	}
	public function save()
	{	
		$res=$this->member->checkmember($this->input->post('key'));
		$id=$res[0]->member_id;
		$ress=$this->book->checkisbn($this->input->post('isbn'));
		$bid=$ress[0]->book_id;
		// print_r($res);
		// exit();
        $data = array(  
        'member_id'     => $id,
        'librarian_id'  => $this->session->user->librarian_id,
        'book_id'       => $bid,
        'issuedate'     => date('Y-m-d H:m:s')
    	);
    	$da = array(
			'book_status' => 1
		);
		$this->db->where('book_id', $bid);
		$this->db->update('books', $da);
       $ret= $this->borrow->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Book Assigned Successfully");
       	redirect("borrows");
       }
	}
	public function borrows()
	{
		//$data['data']=$this->borrow->alldata();
		$this->load->view('borrow/borrow_all');
	}
	public function edit()
	{
		$data['books']=$this->book->alldata();
		$data['members']=$this->member->alldata();
		$id=$this->uri->segment('3');
		$data['data']=$this->borrow->singledata($id);

		$this->load->view('borrow/borrow_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'member_id'     => $this->input->post('member'),
        'librarian_id'  => $this->session->user->librarian_id,
        'book_id'       => $this->input->post('book'),
    	);
		$data['id']=$this->input->post('editid');
		$this->borrow->update($data); 
		redirect('borrows/borrows');
	}
	public function delete($value='')
	{
		$this->book->delete($value);
		redirect('borrows/borrows');
	}
	public function returned()
	{
		$data=array(
			'member_id' => $_REQUEST['member_id'],
			'borrowed_id' => $_REQUEST['borrowed_id'],
			'fine_amount' => $_REQUEST['fine'],
			'fine_comments' => $_REQUEST['comments'],
			'book_condition' => $_REQUEST['condition'],
		);
		// print_r($data);
		// exit();
		if ($_REQUEST['fine']) {
			$this->fine->addfine($data);
		}
		
		
		// function returned($id,$book,$member)
		 $this->borrow->returned($_REQUEST['borrowed_id'],$_REQUEST['book_id']);
		 $this->session->set_flashdata('success',"Book Returned");
		redirect('members/single/'.$_REQUEST['member_id']);
	}
	public function search()
	{
		if ($_REQUEST['member']) {
			$membername=" AND member.member_name LIKE "."'%".$_REQUEST['member']."%'";
		}
		if ($_REQUEST['book']) {
			$bookname= " AND books.book_name LIKE "."'%".$_REQUEST['book']."%'";
		}
		
		echo $sdate=$this->input->post('sdate');
		$edate=$this->input->post('edate');
		
		
		if ($sdate || $edate) {
			$where=" WHERE";
			if ($sdate) {
				$where.=" issuedate >= '".$sdate."'";
			}
			if ($edate) {
				if ($sdate) {
				$where.=" AND";
				}
				$where.=" issuedate <= '".$edate." ".date('H:m:s')."'";
			}
			$sdate AND $edate."'";
		}
		$q="SELECT *,librarian.name As libname FROM `borrowed`
			JOIN books ON books.book_id=borrowed.book_id ";
		$q.=@$bookname;
		$q.="JOIN member ON member.member_id=borrowed.member_id";
		$q.= @$membername;
		$q.=" JOIN author ON author.author_id=books.author_id
			JOIN subject on subject.subject_id=books.subject_id
			JOIN publisher on publisher.publisher_id=books.publisher_id
			JOIN librarian ON librarian.librarian_id=borrowed.librarian_id";
		$q.=@$where;
		$data['data']=$this->db->query($q)->result();
		//echo $this->db->last_query();
		// echo "<pre>";
		// print_r($data['data']);
		// echo "</pre>";
		//exit();
		$this->load->view('borrow/borrow_all',$data);
	}
	
}
?>
