<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('book');
		$this->load->model('member');
		$this->load->model('borrow');
	}
	public function index()
	{
		// writelang('welcome');
		//$this->lang->line('welcome'); 
		$this->load->view('home');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home/index");
	}
	public function checkbook()
	{
		$isbn=$this->input->post('bookid');
		$res=$this->book->assignedto($isbn);
		if (count($res)>0) {
			
			if (!$res[0]->book_status ==0) {
				$stat="Assigned to <a class='btn btn-primary' href='".site_url().'members/single/'.$res[0]->member_id."'>".$res[0]->member_name."</a>";
				
				
			}else{

				$stat="Available &nbsp;<a href=".site_url()."borrows/index/".$res[0]->isbn.">Assign Now</a>";
			}
			echo '<table class="table table-responsive"><tr><th>ISBN</th><th>Name</th><th>Publisher</th><th>Author</th><th>Subject</th><th>Language</th><th>Status</th><tr><tr><td>'.$res[0]->isbn.'</td><td>'.$res[0]->book_name.'</td><td>'.$res[0]->publisher_name.'</td><td>'.$res[0]->author_name.'</td><td>'.$res[0]->subject_name.'</td><td>'.$res[0]->language_name.'</td><td>'.$stat.'</td></tr></table>';
			
		}
	}
	public function checkmember(){
		$id=$this->input->post('memberid');
		$res=$this->member->checkmember($id);
		if (count($res)>0) {
			
			echo '<table class="table table-responsive"><tr><th>ID</th><th>Name</th><th>Address</th><th>Details</th><tr><tr><td>'.$res[0]->member_key.'</td><td>'.$res[0]->member_name.'</td><td>'.$res[0]->member_address.'</td><td><a class="btn btn-primary" href="'.site_url()."members/single/".$res[0]->member_id.'">Show Detalils</a><td></tr></table>';
		}
	}
	public function search() {

        $search_data = $_POST['search_data'];

        $query = $this->book->get_live_items($search_data);

        foreach ($query as $row):
            echo "<li><a href='".site_url()."books/single/$row->isbn'>" . $row->book_name . "</a></li>";

        endforeach;
    }
}
?>
