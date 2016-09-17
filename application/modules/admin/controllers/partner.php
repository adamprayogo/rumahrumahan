<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class partner extends Backend_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('partner_model');
		$this->bk_menu=15;
		$this->bk_title='Đối tác';
	}

	function index(){
		$base_url=base_url().'admin/hotline';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->partner_model->total(array(),array());
		$data['list'] = $this->partner_model->get("*", array(),array(),$first,$this->pg_per_page, array('id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$data['heading']=$this->lang->line('msg_partner');
		$this->render_backend_tp('backends/partner/index',$data);
	}

	public function create(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('title','tiêu đề', 'trim|required|min_length[2]|xss_clean');
			if($this->form_validation->run()!=false){
				$data['title']=$this->input->post('title');
				$insert_id=$this->partner_model->insert($data);
				if($insert_id!=0){
					if(!empty($_FILES['avt']['tmp_name'])){
						$filename=$_FILES['avt']['name'];
						$_FILES['avt']['name']=rename_upload_file($filename);
						$dir=create_dir_upload('uploads/partner/');
						$config['allowed_types'] = 'JPEG|jpg|JPG|png';
						$config['max_size'] = '5000';
						$config['width']     = 100;
						$config['height']   = 100;
						$config['upload_path'] = $dir;
						$this->load->library('upload',$config);
						if (!$this->upload->do_upload('avt')){
							$this->session->set_flashdata('msg_failed',$this->upload->display_errors());
							redirect(base_url().'admin/partner/create');
						}else{
							$this->partner_model->update(array('path'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$insert_id));
						}
					}
					$this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
					redirect(base_url().'admin/partner/create');
				}
			}
		}
		$data['heading']=$this->lang->line('msg_add');
		$this->load->model('type_model');
		$data['cats']=$this->type_model->get('*',array('activated'=>ACTIVATED,'type'=>2));
		$this->render_backend_tp('backends/partner/add',$data);
	}


	public function edit(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if(!is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			if(isset($_POST['id_post'])){
				$id = $this->input->post('id_post');
				$this->form_validation->set_rules('title','tiêu đề', 'trim|required|min_length[2]|xss_clean');
				if($this->form_validation->run()){
					$data['title']=$this->input->post('title');
					$this->partner_model->update($data,array('id'=>$id));

					if(!empty($_FILES['avt']['tmp_name'])){
						$obj=$this->partner_model->get_by_id($id);
						try {
							unlink($obj[0]->path);
						} catch (Exception $e) {
							
						}
						$filename=$_FILES['avt']['name'];
						$_FILES['avt']['name']=rename_upload_file($filename);
						$dir=create_dir_upload('uploads/partner/');
						$config['allowed_types'] = 'JPEG|jpg|JPG|png';
						$config['max_size'] = '5000';
						$config['width']     = 100;
						$config['height']   = 100;
						$config['upload_path'] = $dir;
						$this->load->library('upload',$config);
						if (!$this->upload->do_upload('avt')){
							$this->session->set_flashdata('msg_failed',$this->upload->display_errors());
							redirect(base_url().'admin/partner/edit?id='.$id);	
						}else{
							$this->partner_model->update(array('path'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$id));
						}
					}

					$this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
					redirect(base_url().'admin/partner/edit?id='.$id);	
				}
			}

			$data['obj']=$this->partner_model->get_by_id($id);
			if($data['obj']==null){
				redirect('notfound');
			}
			$data['heading']=$this->lang->line('msg_edit');
			$this->render_backend_tp('backends/partner/edit',$data);
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
			$obj=$this->partner_model->get_by_id($id);
			try {
				unlink($obj[0]->path);
			} catch (Exception $e) {

			}
			$this->partner_model->remove_by_id($id);
			redirect('admin/partner');
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
			$config['total_rows'] = $this->partner_model->total(array(), array('phone'=>$query));
			$config['base_url']= base_url() . 'admin/hotline/search?order='.$order.'&query='.$query;
			$config['per_page']=$per_page;
			$data['msg_label']=$this->config->item('msg_label');
			$this->pagination->initialize($config);
			$data['list'] = $this->partner_model->get_by_phone($query,$page,$per_page);
			$data['page_link'] = $this->pagination->create_links();
			$data['search_title']=$this->lang->line('result_search_for').'&nbsp;"'.$query.'"';
			$this->render_backend_tp('backends/partner/index',$data);
		}else{
			redirect('notfound');
		}
	}

	function activate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->partner_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
		}
		redirect('admin/partner');
	}

	function deactivate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->partner_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
		}
		redirect('admin/partner');
	}

}
?>