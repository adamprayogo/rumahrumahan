<?php
class packages extends MY_Controller
{
	function __construct()
	{
		parent::__construct();	
	}
	
	function index(){
		$this->load->model('packages_model');
		$data['list']=$this->packages_model->get($select = "*", array('activated'=>ACTIVATED), array(),false,false,false);
		$this->render_frontend_tp('frontends/packages/index',$data);
	}
}
?>