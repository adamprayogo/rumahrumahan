<?php
class Properties extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('type_model');
		$this->load->model('estates_model');
		$this->load->model('images_model');
		$this->ft_menu=0;
	}

	function detail(){
		$id=$this->uri->segment(3);
		if(is_numeric($id)){
			if($id<=0){
				redirect('notfound');
			}
			$data['obj']=$this->estates_model->get_by_id($id,ACTIVATED,ACTIVATED);
			if($data['obj']==null){
				redirect('notfound');
			}
			$this->load->library('ultils');
			$this->ultils->view_counter($id);
			$data['images']=$this->images_model->get_by_estates_id($id);
			$user_id=$data['obj'][0]->user_id;
			$data['other_list']=$this->estates_model->get_by_user_id_and_diff_estates_id($user_id,$id,0,5,ACTIVATED,ACTIVATED);
			$this->load->model('estates_amenities_model');
			$data['amenities']=$this->estates_amenities_model->get_by_estates_id($id);
			$this->ft_title=$data['obj'][0]->title;
			$data['meta_description']=$data['obj'][0]->description;
			$data['meta_kw']=$data['obj'][0]->keyword;
			$this->render_frontend_tp('frontends/properties/detail',$data);
		}else{
			redirect('notfound');
		}
	}

	function type(){
/*		$this->ft_menu=1;
		$id=$this->uri->segment(3);
		if(!is_numeric($id) || $id<=0){
			redirect('notfound');
		}
		$this->pg_per_page=9;
		$this->load->model('county_model');
		$base_url=base_url().'properties/type/'.$id;
		$page=$this->uri->segment(4);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$where =  array('estates.activated'=>ACTIVATED,'types_id'=>$id,'users.activated'=>ACTIVATED);
		$total_rows=$this->estates_model->total($where,array());
		$data['estates']=$this->estates_model->get("*,estates.id as id", $where, false, $first, $this->pg_per_page, array('estates.created_at'=>'DESC'));	

		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page,4);
		$data['types']=$this->type_model->get("*", false, false, 0, 100, false);
		$data['county']=$this->county_model->get("*", false, false, 0, 100, false);
		$data['title']=$data['types'][0]->name;
		$this->ft_title=$data['title'];
		//echo 'suck';
		$this->render_frontend_tp('frontends/properties/search',$data);*/
		$id=$this->uri->segment(3);
		if(!is_numeric($id) || $id<=0){
			redirect('notfound');
		}
		$this->pg_per_page=9;
		$this->load->model('county_model');
		$base_url=base_url().'properties/type/'.$id;
		$page=$this->uri->segment(4);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$where =  array('estates.activated'=>ACTIVATED,'users.activated'=>ACTIVATED);
		$where['FIND_IN_SET('.$id.',types_id)<>']=0;
		$this->load->model('type_model');
		$type=$this->type_model->get_by_id($id);
		if($type[0]->parent_id==0){
			$this->ft_menu=$id;
		}else{
			$this->ft_menu=$type[0]->parent_id;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->estates_model->total($where,array());
		$data['estates']=$this->estates_model->get("*,estates.id as id,estates.address as address,cities.name as cities_name,county.name as county_name", $where, false, $first, $this->pg_per_page, array('estates.created_at'=>'DESC'));	
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page,4);
		$data['types']=$this->type_model->get_by_id($id);
		$data['county']=$this->county_model->get("*", false, false, 0, 100, false);
		$data['title']=$data['types'][0]->name;
		$this->ft_title=$data['title'];
		$this->render_frontend_tp('frontends/properties/search',$data);
	}

	function my_properties(){
		$this->ft_menu=5;
		if(!isset($_SESSION['user'])){
			redirect(base_url().'users/login');
		}
		$user=$_SESSION['user'][0];
		$where['user_id']=$user->id;
		$base_url=base_url() . 'properties/my_properties';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$total_rows=$this->estates_model->total(array(),array());
		$data['list'] = $this->estates_model->get("*,estates.id as id,estates.activated as activated", $where,array(),$first,$this->pg_per_page, array('estates.id' => 'DESC'));
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);

		$this->render_frontend_tp('frontends/properties/index',$data);
	}

	function recent(){
		$this->pg_per_page=9;
		$this->load->model('county_model');
		$base_url=base_url().'properties/recent';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$where =  array('estates.activated'=>ACTIVATED,'users.activated'=>ACTIVATED);
		$total_rows=$this->estates_model->total($where,array());

		$data['estates']=$this->estates_model->get("*,estates.id as id", $where, false, $first, $this->pg_per_page, array('estates.created_at'=>'DESC'));	
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$data['types']=$this->type_model->get("*", false, false, 0, 100, false);
		$data['county']=$this->county_model->get("*", false, false, 0, 100, false);
		$data['title']=$this->lang->line('msg_recent_properties');
		$this->ft_title=$data['title'];
		$this->render_frontend_tp('frontends/properties/search',$data);
	}

	function featured(){
		$this->pg_per_page=9;
		$this->load->model('county_model');
		$base_url=base_url().'properties/featured';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;
		$where =  array('estates.activated'=>ACTIVATED,'estates.status'=>FEATURED,'users.activated'=>ACTIVATED);
		$total_rows=$this->estates_model->total($where,array());
		
		$data['ft_estates']=$this->estates_model->get("*,estates.id as id,estates.address as address", $where, false, $first, $this->pg_per_page, array('estates.created_at'=>'DESC'));		
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$data['types']=$this->type_model->get("*", false, false, 0, 100, false);
		$data['county']=$this->county_model->get("*", false, false, 0, 100, false);
		$data['title']=$this->lang->line('msg_featured_properties');
		$this->ft_title=$data['title'];
		$this->render_frontend_tp('frontends/properties/search',$data);
	}

	function search(){
		$this->pg_per_page=9;
		$this->load->model('county_model');
		$where = '`estates`.`activated`=1 AND `users`.`activated`='.ACTIVATED;
		if($_GET){
			$min_price=$this->input->get('min_price');
			$max_price=$this->input->get('max_price');
			$purpose=$this->input->get('purpose');
			$types=$this->input->get('types');
			$cities=$this->input->get('cities');
			$county=$this->input->get('county');
			$area=$this->input->get('area');
			$bedrooms=$this->input->get('bedrooms');
			$query='purpose='.$purpose.'&types='.$types.'&county='
			.$county.'&cities='.$cities.'&min_price='.$min_price
			.'&max_price='.$max_price.'&area='.$area.'&bedrooms='.$bedrooms;

			if($county!=null && is_numeric($county) && $county>0){
				$where.=' AND `estates`.`county_id`='.$county;
			}

			if($types!=null && is_numeric($types) && $types>0){
				$where.=' AND FIND_IN_SET('.$types.',estates.types_id)!=0';
			}

			if($cities!=null && is_numeric($cities) && $cities>0){
				$where.=' AND `estates`.`cities_id`='.$cities;
			}

			if($area!=null && is_numeric($area) && $purpose>0){
				$where.=' AND `estates`.`area`='.$area;
			}

			if($bedrooms!=null && is_numeric($bedrooms) && $purpose>0){
				$where.=' AND `estates`.`bedrooms`='.$bedrooms;
			}

			if($purpose!=null && is_numeric($purpose) && $purpose>0){
				$where.=' AND `estates`.`purpose`='.$purpose;
			}

			if($min_price!=null && $max_price!=null){
				if($min_price!=null && $min_price>0 && is_numeric($min_price) && $max_price!=null && $max_price>0 && is_numeric($max_price)){
					$where.=' AND `price` BETWEEN '.$min_price;
					$where.=' AND '.$max_price;
				}
			}else{
				if($min_price!=null && $min_price>0 && is_numeric($min_price)){
					$where.=' AND `estates`.`price`='.$min_price;
				}
				if($max_price!=null && $max_price>0 && is_numeric($max_price)){
					$where.=' AND `estates`.`price`='.$max_price;
				}
			}
		}

		$base_url= base_url() . 'properties/search?'.$query;
		$this->load->model('county_model');
		$page=$this->input->get('page');
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;

		$total_rows = $this->estates_model->total_by_query('SELECT
			count(*) AS total
			FROM
			(`estates`)
			JOIN `types` ON `estates`.`types_id` = `types`.`id`
			JOIN `county` ON `estates`.`county_id` = `county`.`id`
			JOIN `users` ON `estates`.`user_id` = `users`.`id`
			JOIN `cities` ON `estates`.`cities_id` = `cities`.`id`
			WHERE '.$where);

		$data['page_link'] = $this->pagination->create_links();
		$data['estates']=$this->estates_model->get_by_query_desktop('SELECT *, `estates`.`id` AS id,
			`estates`.`address` AS address
			FROM
			(`estates`)
			JOIN `types` ON `estates`.`types_id` = `types`.`id`
			JOIN `county` ON `estates`.`county_id` = `county`.`id`
			JOIN `users` ON `estates`.`user_id` = `users`.`id`
			JOIN `cities` ON `estates`.`cities_id` = `cities`.`id`
			LEFT JOIN `marker` ON `estates`.`marker_id` = `marker`.`id`
			WHERE '.$where.' ORDER BY `estates`.`created_at` DESC LIMIT '.$first.','.$this->pg_per_page);
		//echo $this->db->last_query();
		$data['types']=$this->type_model->get("*", false, false, 0, 100, false);
		$data['county']=$this->county_model->get("*", false, false, 0, 100, false);
		$data['title']=$this->lang->line('msg_search');
		$this->ft_title=$data['title'];
		$data['page_link'] =parent::search_pagination_config($base_url,$total_rows,$this->pg_per_page);
		$this->render_frontend_tp('frontends/properties/search',$data);
	}


	public function create(){
		$this->ft_menu=5;
		parent::authentication_frontend();
		parent::select_package();
		$this->load->model('county_model');
		$data['county']=$this->county_model->get();
		$this->load->model('type_model');
		$data['types']=$this->type_model->get();
		$this->load->model('marker_model');
		$data['marker']=$this->marker_model->get();
		$this->load->model('amenities_model');
		$data['amenities']=$this->amenities_model->get();
		$this->render_frontend_tp('frontends/properties/add',$data);
	}


	public function edit_get(){
		$this->ft_menu=5;
		parent::authentication_frontend();
		if(isset($_GET['id'])){
			$id=$this->input->get('id');
			$user=$_SESSION['user'][0];
			$data=$this->estates_model->get_by_id_and_user_id($id,$user->id);
			if($data==null){
				redirect(base_url());
			}
			$this->load->model('county_model');
			$data['county']=$this->county_model->get();
			$this->load->model('type_model');
			$data['types']=$this->type_model->get();
			$data['obj']=$this->estates_model->get_by_id($id);
			if($data['obj']==null){
				redirect('notfound');
			}
			$this->load->model('amenities_model');
			$data['amenities']=$this->amenities_model->get();
			$this->load->model('estates_amenities_model');
			$data['amenities_check']=$this->estates_amenities_model->get_by_estates_id($id);
			$this->load->model('images_model');
			$this->load->model('marker_model');
			$data['marker']=$this->marker_model->get();
			$data['images']=$this->images_model->get_by_estates_id($id);
			$this->load->model('cities_model');
			$data['cities']=$this->cities_model->get_by_county_id($data['obj'][0]->county_id);
			$this->render_frontend_tp('frontends/properties/edit',$data);
		}
	}

	function post(){
		$page=$this->uri->segment(4);
		$this->load->model('posts_model');
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$id=$this->uri->segment(2);
		$this->load->model('type_model');
		$obj=$this->type_model->get_by_id($id);
		$this->ft_title=$obj[0]->name;
		if($obj[0]->parent_id==0){
			$this->ft_menu=$id;
		}else{
			$this->ft_menu=$obj[0]->parent_id;
		}
		$base_url=base_url().'chuyen-muc/'.$id.'/'.$this->uri->segment(3);
		$first=($page-1)*$this->pg_per_page;

		$where =  array('posts.activated'=>ACTIVATED,'users.activated'=>ACTIVATED);
		$where['FIND_IN_SET('.$id.',cat_id)<>']=0;

		$total_rows=$this->posts_model->total($where,array());
		$data['list'] = $this->posts_model->get("posts.id as id,description,posts.avt as avt,posts.updated_at as updated_at,posts.created_at as created_at,title,posts.activated as activated",$where,false,$first, $this->pg_per_page, array('id' => 'DESC'));
		$data['page_link'] = parent::pagination_config($base_url,$total_rows,$this->pg_per_page,4);
		$this->render_frontend_tp('frontends/post/cat',$data);
	}

}
?>