<?php
class denied extends MY_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->library('ultils');
		$this->ultils->_load_view('denied');
	}

	function demo(){
		$this->load->view('demo');
	}
}
?>