<?php
/**
* 
*/
class Lang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->lang->load('information','urdu');
		
	}
	function index(){

		echo $this->lang->line('welcome');
	}
}
?>