<?php
class agent extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->ft_menu=2;
	}


	function profile(){
		$id=$this->uri->segment(3);
		if(is_numeric($id) && $id>0){
			$this->load->model('estates_model');
			$this->load->model('users_model');
			$agent=$this->users_model->get_by_id($id, ACTIVATED);
			if($agent!=null){
				$data['obj']=$agent;
				$where['user_id']=$id;
				$this->pg_per_page=9;
				$this->load->model('county_model');
				$base_url=base_url().'agent/profile/'.$id;
				$page=$this->uri->segment(4);
				if(!is_numeric($page) || $page<=0){
					$page=1;
				}
				$first=($page-1)*$this->pg_per_page;
				$total_rows=$this->estates_model->total($where,array());

				$data['estates'] = $this->estates_model->get_by_user_id($id,$first,$this->pg_per_page);
				$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page,4);


				$this->ft_title=$this->lang->line('msg_profile').' - '.$agent[0]->full_name;
				$this->render_frontend_tp('frontends/users/agent',$data);
			}else{
				redirect('notfound');
			}
		}else{
			redirect('notfound');
		}
	}

	function list_all(){
		$this->ft_title=$this->lang->line('msg_agents');
		$this->pg_per_page=10;
		$this->load->model('users_model');
		$where=array('perm <>'=>USER,'activated'=>ACTIVATED);
		$this->load->model('county_model');
		$base_url=base_url() . 'agent/list_all';
		$page=$this->uri->segment(3);
		if(!is_numeric($page) || $page<=0){
			$page=1;
		}
		$first=($page-1)*$this->pg_per_page;	
		$total_rows=$this->users_model->total($where,array());
		$data['agents'] = $this->users_model->get("*", $where, false, $first, $this->pg_per_page, array('created_at'=>'DESC')); 
		$data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
		$this->render_frontend_tp('frontends/users/agent_list',$data);
	}
}

?>