<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class post_cats extends Backend_Controller{

	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['user'])){
			redirect('admin/dashboard');
		}else{
			$user=$_SESSION['user'][0];
			if($user->perm==USER){
				redirect('admin/denied');
			}
		}
		$this->load->model('cat_model');
		$this->bk_menu=13;
		$this->bk_title='Chuyên mục';
	}

	function index(){
		$base_url=base_url().'admin/post_cats';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->cat_model->total(array(),array());

		$data['list'] = $this->cat_model->get("*,", array(),array(),$first, $this->pg_per_page, array('id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$data['heading']='Chuyên mục';
		$this->render_backend_tp('backends/posts/cats_index',$data);
	}

	public function create(){
		if(isset($_POST['name'])){
			$this->form_validation->set_rules('name','name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
			$this->form_validation->set_rules('order', 'order', 'trim|required|integer|xss_clean');
			if($this->form_validation->run()!=false){
				$data['name']=$this->input->post('name');
				$data['parent_id']=$this->input->post('parent_id');
				$data['activated']=ACTIVATED;
				$data['order']=$this->input->post('order');
				$insert_id=$this->cat_model->insert($data);
				if($insert_id!=0){
					$this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
					redirect(base_url().'admin/post_cats/create');
				}
			}
		}
		$data['heading']=$this->lang->line('msg_add');
		$data['cats']=$this->cat_model->get('*',array('activated'=>ACTIVATED));
		$this->render_backend_tp('backends/posts/cats_add',$data);
	}

	public function edit(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if(!is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			if(isset($_POST['id_post'])){
				$id=$this->input->post('id_post');
				$this->form_validation->set_rules('name','name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
				$this->form_validation->set_rules('order', 'order', 'trim|required|integer|xss_clean');
				if($this->form_validation->run()){
					$update_data['name']=$this->input->post('name');
					$update_data['parent_id']=$this->input->post('parent_id');
					$data['order']=$this->input->post('order');
					$this->cat_model->update($update_data,array('id'=>$id));
					$this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
					redirect(base_url().'admin/post_cats/edit?id='.$id);
				}
			}
			$data['obj']=$this->cat_model->get_by_id($id);
			$data['cats']=$this->cat_model->get('*',array('id <>'=>$id,'activated'=>ACTIVATED));
			if($data['obj']==null){
				redirect('notfound');
			}
			$data['heading']=$this->lang->line('msg_edit');
			$this->render_backend_tp('backends/posts/cats_edit',$data);
		}else{
			redirect('notfound');
		}
	}

	function activate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->cat_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
		}
		redirect(base_url().'admin/post_cats');
	}

	function deactivate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->cat_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
		}
		redirect(base_url().'admin/post_cats');
	}

	public function delete(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->cat_model->remove_by_id($id);
			redirect('admin/post_cats');
		}
	}

	function detail(){
		$id=$this->input->get('id');
		if($id!=null && is_numeric($id)){
			$data['list'] = $this->cat_model->get_by_id($id);
			$this->render_backend_tp('backends/posts/cats_index',$data);
		}
	}

	public function search(){
		if(isset($_GET['query'])){
			$query=$this->input->get('query');
			$page     = $this->input->get('page') ? $this->input->get('page') : 0;
			$per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;
			$order    = $this->input->get('order') ? $this->input->get('order') : 'DESC';
			$config['total_rows'] = $this->cat_model->total(array(), array('name'=>$query));
			$config['base_url']= base_url() . 'admin/contact/search?order='.$order.'&query='.$query;
			$config['per_page']=$per_page;
			$data['msg_label']=$this->config->item('msg_label');
			$this->pagination->initialize($config);
			$data['list'] = $this->cat_model->get_by_name($query,$page,$per_page);
			$data['page_link'] = $this->pagination->create_links();
			$data['search_title']=$this->lang->line('result_search_for').'&nbsp;"'.$query.'"';
			$this->render_backend_tp('backends/posts/cats_index',$data);
		}
	}
}
?>