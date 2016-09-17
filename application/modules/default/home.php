<?php
class home extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('estates_model');
	}

	function index(){
		$this->ft_menu=0;
		$this->ft_title=$this->lang->line('msg_home');
		$data['featured_estates']=$this->estates_model->get("*,estates.id as id,estates.address as address", array('estates.activated'=>ACTIVATED,'estates.status'=>FEATURED,'users.activated'=>ACTIVATED), false, 0, 6, array('estates.created_at'=>'DESC'));		
		$data['recent_estates']=$this->estates_model->get("*,estates.id as id,estates.address as address", array('estates.activated'=>ACTIVATED,'users.activated'=>ACTIVATED), false, 0, 6, array('estates.created_at'=>'DESC'));
		$this->load->model('users_model');
		$this->render_frontend_tp('frontends/index','default',$data);
	}

	function contact(){
		$this->ft_menu=3;
		$this->ft_title=$this->lang->line('msg_contact');
		if(isset($_POST['full_name'])){
			$this->form_validation->set_rules('subject', $this->lang->line('subject'), 'trim|required|min_length[5]|max_length[100]|xss_clean');
			$this->form_validation->set_rules('full_name', $this->lang->line('msg_full_name'), 'trim|required|min_length[5]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('msg_email'), 'trim|valid_email|required|min_length[5]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('phone', $this->lang->line('msg_phone'), 'numeric|trim|required|min_length[5]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('content', $this->lang->line('msg_content'), 'trim|required|min_length[5]|max_length[500]|xss_clean');
			if($this->form_validation->run()){
				$data['full_name']=$this->input->post('full_name');
				$data['email']=$this->input->post('email');
				$data['phone']=$this->input->post('phone');
				$data['content']=$this->input->post('content');
				$data['subject']=$this->input->post('subject');
				$this->load->model('contact_model');
				$this->contact_model->insert($data);
				$this->session->set_flashdata('msg_ok', $this->lang->line('contact_sent'));
				redirect(base_url().'home/contact');
			}
		}
		$this->ultils->_render_frontend();
	}
}
?>