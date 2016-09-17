<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $bk_menu = 0;
	protected $ft_menu=0;
	protected $bk_title = SITE_NAME;
	protected $ft_title=SITE_NAME;
	protected $pg_per_page=10;

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
		$this->load->helper('language');
		$this->load->model('languages_model');
		$data=$this->languages_model->get_activated();
		$this->load->helper('ultils');
		//var_dump($data);

		/*Loading new language*/
		if($data!=null && check_exist_dir(APPPATH.'language/'.$data[0]->name) && file_exists(APPPATH.'language/'.$data[0]->name)){
			$this->lang->load('msg',$data[0]->name);
		}else{
			$this->lang->load('msg',$this->config->item('language'));
		}
		$this->form_validation->set_error_delimiters('<span class="help-inline msg-error" generated="true">', '</span>');
		$this->load->helper('settings');
	}

	function render_backend_tp($content, $data = null){
		$data['general_setting']=getSettings(GENERAL_SETTING_FILE);
		$data['contact_info_setting']=getSettings(CONTACT_INFO_SETTING_FILE);
		//$this->template->set_template('backend');
		$data['menu']=$this->bk_menu;
		$data['title']=$this->bk_title;
/*		$this->template->write_view('content',$content,$data);
		$this->template->render();*/
		$this->ultils->_render_backend($content,$data);
	}
	
	function render_frontend_tp($content, $data = null )
	{
		$data['general_setting']=getSettings(GENERAL_SETTING_FILE);
		$data['contact_info_setting']=getSettings(CONTACT_INFO_SETTING_FILE);
		if($this->ft_title==''){
			$this->ft_title=$data['general_setting']['title'];
		};
		$data['title']=$this->ft_title;
		$data['menu']=$this->ft_menu;
		$this->ultils->_render_frontend($content,$data);
	}

	protected function authentication_backend(){
		if(!isset($_SESSION['user'])){
			redirect('admin/dashboard');
		}else{
			$user=$_SESSION['user'][0];
			if($user->perm==USER){
				redirect('admin/denied');
			}
		}
	}

	protected function authentication_frontend(){
		if(!isset($_SESSION['user'])){
			//self::render_frontend_tp('frontends/login');
			//return;
			redirect('users/login');
		}
	}

	protected function redirect(){
		if(isset($_SESSION['redirect'])){
			redirect($_SESSION['redirect']);
		}
	}


	function pagination_config($base_url,$total_rows,$per_page=10,$uri_segment=3){
		$config['total_rows'] = $total_rows;
		$config['base_url']=$base_url;
		$config['per_page']=$per_page;
		$config['uri_segment']=$uri_segment;
		$this->pagination->initialize($config);
		$data=$this->pagination->create_links();
		return $data;
	}

	function search_pagination_config($base_url,$total_rows,$per_page=10,$uri_segment=3){
		$config['total_rows'] = $total_rows;
		$config['base_url']=$base_url;
		$config['per_page']=$per_page;
		//$config['uri_segment']=$uri_segment;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$this->pagination->initialize($config);
		$data=$this->pagination->create_links();
		return $data;
	}


	protected function select_package(){
		$user=$_SESSION['user'];
		if($user[0]->perm==USER || $user[0]->perm==AGENT){
			$this->load->model('users_model');
			$obj=$this->users_model->get_by_id($user[0]->id);
			if(($obj[0]->posted >= $obj[0]->max_post) || (strtotime($obj[0]->expr_time) < strtotime(date("Y-m-d")))) {
				redirect(base_url().'packages');
			}
		}
	}

	public function demo(){
		//demo code
		redirect('admin/denied/demo');
	}

	function post_demo(){
		if($_POST){
			$this->demo();
		}
	}
}

/* End of file MY_Controller.php */

/* Location: ./application/core/MY_Controller.php */

