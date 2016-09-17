<?php
class page extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->ft_menu=4;
		$this->ft_title=$this->lang->line('msg_pages');
		$this->load->model('page_model');
	}

	function load(){
		$id = $this->uri->segment(3);
		if(!is_numeric($id) || $id<0){
			redirect('notfound');
		}
		$data['obj']=$this->page_model->get_by_id($id);
		if($data['obj']==null){
			redirect('notfound');
		}
		$this->ft_title=$data['obj'][0]->title;
		$data['meta_description']=$data['obj'][0]->description;
		$data['meta_kw']=$data['obj'][0]->keyword;
		$this->render_frontend_tp('frontends/pages/index',$data);
	}
}
?>