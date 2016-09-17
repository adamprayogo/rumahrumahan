<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class packages extends Backend_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('packages_model');
		$this->bk_menu=16;
		$this->bk_title=$this->lang->line('msg_county');
	}

	function index(){
		$base_url=base_url().'admin/packages';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$data['heading']=$this->lang->line('msg_packages');
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->packages_model->total(array(),array());
		$data['list'] = $this->packages_model->get("*", array(),array(),$first,$this->pg_per_page, array('id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$this->render_backend_tp('backends/packages/index',$data);
	}

	public function create(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('title','title', 'trim|required|min_length[2]|max_length[60]|xss_clean');
			$this->form_validation->set_rules('max_post',lang('msg_maximum_listing'), 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('expr_time', lang('msg_expiration_time'), 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('description', lang('msg_description'), 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', lang('msg_price'), 'trim|required|xss_clean|numeric');
			if($this->form_validation->run()!=false){
				$data['title']=$this->input->post('title');
				$data['price']=$this->input->post('price');
				$data['max_post']=$this->input->post('max_post');
				$data['expr_time']=$this->input->post('expr_time');
				$data['description']=$this->input->post('description');
				$data['price']=$this->input->post('price');
				$insert_id=$this->packages_model->insert($data);
				if($insert_id!=0){
					$this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
					redirect(base_url().'admin/packages/create');
				}
			}
		}
		$data['heading']=$this->lang->line('msg_add');
		$this->render_backend_tp('backends/packages/add',$data);
	}


	public function edit(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');

			if(!is_numeric($id) || $id<=0){
				redirect('notfound');
			}

			if(isset($_POST['id'])){
				$id = $this->input->post('id');
				$this->form_validation->set_rules('title','title', 'trim|required|min_length[2]|max_length[60]|xss_clean');
				$this->form_validation->set_rules('max_post',lang('msg_maximum_listing'), 'trim|required|xss_clean|integer');
				$this->form_validation->set_rules('expr_time', lang('msg_expiration_time'), 'trim|required|xss_clean|integer');
				$this->form_validation->set_rules('description', lang('msg_description'), 'trim|required|xss_clean');
				$this->form_validation->set_rules('price', lang('msg_price'), 'trim|required|xss_clean|numeric');
				if($this->form_validation->run()){
					$data['title']=$this->input->post('title');
					$data['max_post']=$this->input->post('maximum_listing');
					$data['expr_time']=$this->input->post('expr_date');
					$data['description']=$this->input->post('description');
					$data['price']=$this->input->post('price');
					$this->packages_model->update($data,array('id'=>$id));
					$this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
					redirect(base_url().'admin/packages/edit?id='.$id);	
				}
			}
			$data['obj']=$this->packages_model->get_by_id($id);
			if($data['obj']==null){
				redirect('notfound');
			}
			$data['heading']=$this->lang->line('msg_edit');
			$this->render_backend_tp('backends/packages/edit',$data);
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
			$this->packages_model->remove_by_id($id);
			redirect('admin/packages');
		}else{
			redirect('notfound');
		}
	}


	public function activated(){
		parent::authentication_backend();
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			echo $id;
			$this->packages_model->update(array('activated'=>1),array('id'=>$id));
		}
		redirect('admin/packages');
	}

	public function deactivated(){
		parent::authentication_backend();
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->packages_model->update(array('activated'=>0),array('id'=>$id));
		}
		redirect('admin/packages');
	}

	public function search(){
		if(isset($_GET['query'])){
			$base_url=base_url().'admin/packages';
			$page=$this->uri->segment(3);
			if(!is_numeric($page) || $page<=0){
				$page=1;
			}
			$query=$this->input->get('query');
			$first=($page-1)*$this->pg_per_page;
			$total_rows=$this->packages_model->total(array(), array('title'=>$query));
			$data['list'] = $this->packages_model->get_by_title($query,$first,$this->pg_per_page);
			$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
			$data['search_title']=$this->lang->line('result_search_for').'&nbsp;"'.$query.'"';
			$this->render_backend_tp('backends/packages/index',$data);

		}else{
			redirect('notfound');
		}
	}
}
?>