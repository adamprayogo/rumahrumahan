<?php
 /**
 * 
 */
 class posts extends MY_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('posts_model');
 		$this->ft_menu=0;
 	}

 	function index(){
 		$page=$this->uri->segment(4);
 		if(!is_numeric($page) || $page<=0){
 			$page=1;
 		}
 		$id=$this->uri->segment(2);
 		$this->load->model('cat_model');
 		$obj=$this->cat_model->get_by_id($id);
 		$this->ft_title=$obj[0]->name;
 		if($obj[0]->parent_id==0){
 			$this->ft_menu=$id;
 		}else{
 			$this->ft_menu=$obj[0]->parent_id;
 		}
 		$base_url=base_url().'chuyen-muc/'.$id.'/'.$this->uri->segment(3);
 		$first=($page-1)*$this->pg_per_page;
 		$total_rows=$this->posts_model->total(array('cat_id'=>$id),array());
 		$data['list'] = $this->posts_model->get("id,title,description,avt,updated_at", array('cat_id'=>$id,'posts.activated'=>ACTIVATED),array(),$first, $this->pg_per_page, array('id' => 'DESC'));
 		$data['page_link'] = parent::pagination_config($base_url,$total_rows,$this->pg_per_page,4);
 		$this->render_frontend_tp('frontends/post/cat',$data);
 	}

 	function detail(){
 		$id=$this->uri->segment(3);
 		if($id!=null){
 			$data['obj']=$this->posts_model->get_by_id($id);
 			$data['meta_description']=$data['obj'][0]->description;
 			$data['meta_kw']=$data['obj'][0]->keyword;
 			$data['og_image']=base_url().$data['obj'][0]->avt;
 			$this->ft_title=$data['obj'][0]->title;
 			$this->render_frontend_tp('frontends/post/detail',$data);
 		}
 	}
 }
 ?>