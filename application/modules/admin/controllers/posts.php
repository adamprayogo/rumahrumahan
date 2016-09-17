<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class posts extends Backend_Controller{

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
		$this->load->model('posts_model');
		$this->bk_menu=14;
		$this->bk_title='Bài viết';
	}

	function index(){
		$base_url=base_url().'admin/posts';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->posts_model->total(array(),array());

		$data['list'] = $this->posts_model->get("*,posts.id as id,posts.avt as avt,posts.updated_at as updated_at,posts.created_at as created_at,title,posts.activated as activated", array(),array(),$first, $this->pg_per_page, array('posts.id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
	    $data['heading']=  $this->lang->line('msg_post');
		$this->render_backend_tp('backends/posts/posts_index',$data);
	}


	function create(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('title','tiêu đề', 'trim|required|min_length[2]|xss_clean');
			$this->form_validation->set_rules('description','mô tả', 'trim|required|xss_clean');
			$this->form_validation->set_rules('content','nội dung', 'required');
			//$this->form_validation->set_rules('cat_id', 'chuyên mục', 'trim|required|xss_clean');
			$this->form_validation->set_rules('types', 'chuyên mục', 'required');
			if($this->form_validation->run()!=false){
				$data['title']=$this->input->post('title');
				//$data['cat_id']=$this->input->post('cat_id');
				$data['content']=htmlspecialchars($this->input->post('content'));
			//	htmlentities(string)
				$data['description']=$this->input->post('description');
				$data['keyword']=$this->input->post('keyword');
				$user=$_SESSION['user'][0];
				$data['user_id']=$user->id;
				if(isset($_POST['types'])){
					$types_array=array();
					$types=$_POST['types'];
					foreach ($types as $id) {
						array_push($types_array,$id);
					}
					$types_string=implode(',',$types_array);
					$data['cat_id']=$types_string;
				}

				$insert_id=$this->posts_model->insert($data);
				if($insert_id!=0){
					if(!empty($_FILES['avt']['tmp_name'])){
						$filename=$_FILES['avt']['name'];
						$_FILES['avt']['name']=rename_upload_file($filename);
						$dir=create_dir_upload('uploads/posts/');
						$config['allowed_types'] = 'JPEG|jpg|JPG|png';
						$config['max_size'] = '5000';
						$config['width']     = 100;
						$config['height']   = 100;
						$config['upload_path'] = $dir;
						$this->load->library('upload',$config);
						if (!$this->upload->do_upload('avt')){
							$this->session->set_flashdata('msg_failed',$this->upload->display_errors());
							redirect(base_url().'admin/posts/create');
						}else{
							if($user->avt!=null){
								try {
									unlink($user->avt);
								} catch (Exception $e) {
									echo $e;
								}
							}
							$config=array();
							$config=array(
								"source_image" => $dir.'/'.$_FILES['avt']['name'], 
								"new_image" =>  $dir, 
								"width" => 100,
								"height" => 100,
								'master_dim'=>'height'
								);
							$this->load->library('image_lib',$config);
							$this->image_lib->resize();
							$this->posts_model->update(array('avt'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$insert_id));
						}
					}

					$this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
					redirect(base_url().'admin/posts/create');
				}
			}
		}
		 $data['heading']=$this->lang->line('msg_add');
		$this->load->model('type_model');
		$data['cats']=$this->type_model->get('*',array('activated'=>ACTIVATED,'type'=>2));
		$this->render_backend_tp('backends/posts/posts_add',$data);
	}

	public function edit(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			if(!is_numeric($id) || $id<=0){
				redirect('notfound');
			}
			if(isset($_POST['id_post'])){
				$id=$this->input->post('id_post');
				if(!empty($_FILES['avt']['tmp_name'])){
					$filename=$_FILES['avt']['name'];
					$_FILES['avt']['name']=rename_upload_file($filename);
					$dir=create_dir_upload('uploads/posts/');
					$config['allowed_types'] = 'JPEG|jpg|JPG|png';
					$config['max_size'] = '5000';
					$config['width']     = 100;
					$config['height']   = 100;
					$config['upload_path'] = $dir;
					$this->load->library('upload',$config);
					if ($this->upload->do_upload('avt')){
						$post=$this->posts_model->get_by_id($id);
						if($post[0]->avt!=null){
							try {
								unlink($post[0]->avt);
							} catch (Exception $e) {
								echo $e;
							}
						}
						$config=array();
						$config=array(
							"source_image" => $dir.'/'.$_FILES['avt']['name'], 
							"new_image" =>  $dir, 
							"width" => 100,
							"height" => 100,
							'master_dim'=>'height'
							);
						$this->load->library('image_lib',$config);
						$this->image_lib->resize();
						$this->posts_model->update(array('avt'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$id));
					}
				}

				$this->form_validation->set_rules('title','tiêu đề', 'trim|required|min_length[2]|xss_clean');
				$this->form_validation->set_rules('description','mô tả', 'trim|required|xss_clean');
				$this->form_validation->set_rules('content','nội dung', 'required');
				//$this->form_validation->set_rules('cat_id', 'chuyên mục', 'trim|required|xss_clean');
				$this->form_validation->set_rules('types', 'chuyên mục', 'required');
				if($this->form_validation->run()){
					$data['title']=$this->input->post('title');
					//$data['cat_id']=$this->input->post('cat_id');
					$data['content']=htmlspecialchars($this->input->post('content'));
					$data['description']=$this->input->post('description');
					$data['keyword']=$this->input->post('keyword');
					if(isset($_POST['types'])){
						$types_array=array();
						$types=$_POST['types'];
						foreach ($types as $id1) {
							array_push($types_array,$id1);
						}
						$types_string=implode(',',$types_array);
						$data['cat_id']=$types_string;
					}
					$this->posts_model->update($data,array('id'=>$id));
					$this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
					redirect(base_url().'admin/posts/edit?id='.$id);
				}
			}
			$data['obj']=$this->posts_model->get_by_id($id);
			if($data['obj']==null){
				redirect('notfound');
			}
			$data['heading']=$this->lang->line('msg_edit');
			$this->render_backend_tp('backends/posts/posts_edit',$data);
		}else{
			redirect('notfound');
			//echo 'x';
		}
	}

	function activate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->posts_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
		}
		redirect(base_url().'admin/posts');
	}

	function deactivate(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->posts_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
		}
		redirect(base_url().'admin/posts');
	}

	public function delete(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->posts_model->remove_by_id($id);
			redirect('admin/posts');
		}
	}

	public function pin(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->posts_model->update(array('pined'=>1),array('id'=>$id));
		}
		redirect(base_url().'admin/posts');
	}

	public function depin(){
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$this->posts_model->update(array('pined'=>0),array('id'=>$id));
		}
		redirect(base_url().'admin/posts');
	}

	public function search(){
		if(isset($_GET['query'])){
			$query=$this->input->get('query');
			$data=parent::getDataView();
			$page     = $this->input->get('page') ? $this->input->get('page') : 0;
			$per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;
			$order    = $this->input->get('order') ? $this->input->get('order') : 'DESC';
			$config['total_rows'] = $this->posts_model->total(array(), array('title'=>$query));
			$config['base_url']= base_url() . 'admin/posts/search?order='.$order.'&query='.$query;
			$config['per_page']=$per_page;
			$data['msg_label']=$this->config->item('msg_label');
			$this->pagination->initialize($config);
			$data['list'] = $this->posts_model->get_by_name($query,$page,$per_page);
			$data['page_link'] = $this->pagination->create_links();
			$data['search_title']=$this->lang->line('result_search_for').'&nbsp;"'.$query.'"';
			$this->render_backend_tp('backends/posts/posts_index',$data);
		}
	}
}
?>