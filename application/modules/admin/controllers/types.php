<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class types extends Backend_Controller{
	function __construct()
	{
		parent::__construct();
		$this->bk_menu=0;
		$this->load->model('type_model');
		$this->bk_title=$this->lang->line('msg_types');
	}

	function index(){
		$base_url=base_url().'admin/types';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->type_model->total(array(),array());
		$data['list'] = $this->type_model->get("*,", array(),array(),$first,$this->pg_per_page, array('id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$data['heading']=$this->lang->line('msg_types').' - '. $this->lang->line('msg_categories');
		$this->ft_title=$this->lang->line('msg_types').' - '. $this->lang->line('msg_categories');
		$this->render_backend_tp('backends/types/index',$data);
	}

	public function create(){
		if(isset($_POST['name'])){
			$data['name']=$this->input->post('name');
			$this->form_validation->set_rules('name','name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
			$this->form_validation->set_rules('order', 'order', 'trim|required|integer|xss_clean');
			if($this->form_validation->run()!=false){
				$data['parent_id']=$this->input->post('parent_id');
				$data['order']=$this->input->post('order');
				$data['activated']=ACTIVATED;
				$data['type']=$this->input->post('type');
				$insert_id=$this->type_model->insert($data);
				if($insert_id!=0){
					$this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
					redirect(base_url().'admin/types/create');
				}
			}
		}
		$this->load->model('type_model');
		$data['types']=$this->type_model->get('*',array('activated'=>ACTIVATED));
		$data['heading']=$this->lang->line('msg_add_types');
		$this->render_backend_tp('backends/types/add',$data);
	}

	function detail(){
		$id=$this->input->get('id');
		if($id!=null && is_numeric($id)){
			$data['list'] = $this->type_model->get_by_id($id);
			$data['heading']=$this->lang->line('msg_types');
			$this->render_backend_tp('backends/types/index',$data);
		}
	}

	public function edit(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if($id==null || !is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			if(isset($_POST['id_post'])){
				$id = $this->input->post('id_post');
				$this->form_validation->set_rules('name',$this->lang->line('msg_name'), 'trim|required|min_length[2]|max_length[60]|xss_clean');
				$this->form_validation->set_rules('order', 'order', 'trim|required|integer|xss_clean');
				if($this->form_validation->run()!=false){
					$data['name']=$this->input->post('name');
					$data['parent_id']=$this->input->post('parent_id');
					$data['order']=$this->input->post('order');
					$data['type']=$this->input->post('type');
					$this->type_model->update($data,array('id'=>$id));
					$this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
					redirect(base_url().'admin/types/edit?id='.$id);	
				}
			}
			$data['obj']=$this->type_model->get_by_id($id);
			if($data['obj']==null){
				redirect('notfound');
			}
			$data['heading']=$this->lang->line('msg_edit_types');
			$data['types']=$this->type_model->get('*',array('activated'=>ACTIVATED));
			$this->render_backend_tp('backends/types/edit',$data);
		}else{
			redirect('notfound');
		}
	}

	public function delete(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if($id==null || !is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			$this->type_model->remove_by_id($id);
			redirect('admin/types');
		}else{
			redirect('notfound');
		}
	}

	function activate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->type_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
		}
		redirect(base_url().'admin/types');
	}

	function deactivate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->type_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
		}
		redirect(base_url().'admin/types');
	}

	
	public function search(){
		if(isset($_GET['query'])){
			$query=$this->input->get('query');
			$data=parent::getDataView();
			$page     = $this->input->get('page') ? $this->input->get('page') : 0;
			$per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;
			$order    = $this->input->get('order') ? $this->input->get('order') : 'DESC';
			$config['total_rows'] = $this->type_model->total(array(), array('name'=>$query));
			$config['base_url']= base_url() . 'index.php/admin/types/search?order='.$order.'&query='.$query;
			$config['per_page']=$per_page;
			$data['msg_label']=$this->config->item('msg_label');
			$this->pagination->initialize($config);
			$data['list'] = $this->type_model->get_by_name($query,$page,$per_page);
			$data['page_link'] = $this->pagination->create_links();
			$data['search_title']='Result search for "'.$query.'"';
			$this->render_backend_tp('backends/types/index',$data);

		}
	}
}
?>