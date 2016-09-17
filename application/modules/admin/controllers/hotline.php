<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class hotline extends Backend_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('hotline_model');
		$this->bk_menu=10;
		$this->bk_title=$this->lang->line('msg_hotline');
	}

	function index(){
		$base_url=base_url().'admin/hotline';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->hotline_model->total(array(),array());
		$data['list'] = $this->hotline_model->get("*", array(),array(),$first,$this->pg_per_page, array('id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$data['heading']=$this->lang->line('msg_hotline');
		$this->render_backend_tp('backends/hotline/index',$data);
	}

	public function create(){
		if(isset($_POST['hotline'])){
			$data['phone']=$this->input->post('hotline');
			$this->form_validation->set_rules('hotline','hotline', 'trim|required|min_length[2]|max_length[60]|xss_clean|callback_check_name_exist_add');
			if($this->form_validation->run()!=false){
				$insert_id=$this->hotline_model->insert($data);
				if($insert_id!=0){
					$this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
					redirect(base_url().'admin/hotline/create');
				}
			}
		}
		$data['heading']=$this->lang->line('msg_add');
		$this->render_backend_tp('backends/hotline/add',$data);
	}

	public function check_name_exist_add($phone){
		$data=$this->hotline_model->get_by_exact_phone($phone);
		if ($data!=null)
		{
			$this->form_validation->set_message('check_name_exist_add', $this->lang->line('vl_feild_value_exist'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function check_name_exist_edit(){
		$id=$this->input->post('id_post');
		$name=$this->input->post('phone');
		$data=$this->hotline_model->get_by_phone_and_diff_id($id,$name);
		if($data!=null) {
			$this->form_validation->set_message('check_name_exist_edit', $this->lang->line('vl_feild_value_exist'));
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function edit(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if(!is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			if(isset($_POST['id_post'])){
				$id = $this->input->post('id_post');
				$this->form_validation->set_rules('hotline',$this->lang->line('hotline'), 'trim|required|min_length[2]|max_length[60]|xss_clean|callback_check_name_exist_edit');
				if($this->form_validation->run()){
					$hotline=$this->input->post('hotline');
					$this->hotline_model->update(array('phone'=>$hotline),array('id'=>$id));
					$this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
					redirect(base_url().'admin/hotline/edit?id='.$id);	
				}
			}
			$data['obj']=$this->hotline_model->get_by_id($id);
			if($data['obj']==null){
				redirect('notfound');
			}
					$data['heading']=$this->lang->line('msg_edit');
			$this->render_backend_tp('backends/hotline/edit',$data);
		}else{
			redirect('notfound');
		}
	}

	public function delete(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if(!is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			$this->hotline_model->remove_by_id($id);
			redirect('admin/hotline');
		}else{
			redirect('notfound');
		}
	}

	public function search(){
		if(isset($_GET['query'])){
			$query=$this->input->get('query');
			$page     = $this->input->get('page') ? $this->input->get('page') : 0;
			$per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;
			$order    = $this->input->get('order') ? $this->input->get('order') : 'DESC';
			$config['total_rows'] = $this->hotline_model->total(array(), array('phone'=>$query));
			$config['base_url']= base_url() . 'admin/hotline/search?order='.$order.'&query='.$query;
			$config['per_page']=$per_page;
			$data['msg_label']=$this->config->item('msg_label');
			$this->pagination->initialize($config);
			$data['list'] = $this->hotline_model->get_by_phone($query,$page,$per_page);
			$data['page_link'] = $this->pagination->create_links();
			$data['search_title']=$this->lang->line('result_search_for').'&nbsp;"'.$query.'"';
			$this->render_backend_tp('backends/hotline/index',$data);
		}else{
			redirect('notfound');
		}
	}

	function activate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->hotline_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
		}
		redirect('admin/hotline');
	}

	function deactivate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->hotline_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
		}
		redirect('admin/hotline');
	}

}
?>