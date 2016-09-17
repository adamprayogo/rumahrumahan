<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('images_model');
	}

	function index(){

	}

	function remove(){
		if(isset($_POST['estates_id']) && isset($_POST['data_id'])){
			$id=$this->input->post('data_id');
			$estates_id=$this->input->post('estates_id');
			$data= $this->images_model->get_by_id($id);
			if($data!=null){
				try {
					unlink($data[0]->thumb_path);
					unlink($data[0]->path);
					$this->load->model('estates_model');
					$estates=$this->estates_model->get_by_id($estates_id);
					if($estates[0]->image_path==$data[0]->thumb_path){
						$this->estates_model->update(array('image_path'=>NULL),array('id'=>$estates_id));
					}
					$this->images_model->remove_by_id($id);
				} catch (Exception $e) {
					echo $e;
				}
			}
		}
	}

	function set_thumbnail(){
		if(isset($_POST['thumb_path']) && isset($_POST['estates_id'])){
			$thumb_path=$this->input->post('thumb_path');
			$estates_id=$this->input->post('estates_id');
			$this->load->model('estates_model');
			$this->estates_model->update(array('image_path'=>$thumb_path), array('id'=>$estates_id));
		}
	}
}

/* End of file thumb.php */
/* Location: ./application/controllers/thumb.php */