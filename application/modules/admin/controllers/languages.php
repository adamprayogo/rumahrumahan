<?php
  /**
  * 
  */
  class languages extends MY_Controller
  {
  	
  	function __construct()
  	{
  		parent::__construct();
      $this->load->model('languages_model');
    }

    function index(){
      $base_url=base_url().'admin/languages';
      $page=$this->uri->segment(3);
      if(!is_numeric($page) || $page<=0){
        $page=1;
      }
      $first=($page-1)*$this->pg_per_page;
      $total_rows=$this->languages_model->total(array(),array());
      $data['list'] = $this->languages_model->get("*,", array(),array(),$first,$this->pg_per_page, array('id' => 'DESC'));
      $data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
      $data['heading']=$this->lang->line('languages');
      $this->render_backend_tp('backends/languages/index',$data);
    }

    public function create(){
      $this->load->helper('file');
      if(isset($_POST['lang_name'])){
       $this->form_validation->set_rules('lang_name','lang_name', 'required|callback_check_name_exist_add');
       $this->form_validation->set_rules('string', 'string', 'required');
       $this->form_validation->set_rules('form_validation_lang', 'form_validation_lang', 'required');
       $this->form_validation->set_rules('imglib_lang', 'imglib_lang', 'required');
       $this->form_validation->set_rules('upload_lang', 'upload_lang', 'required');
       $this->form_validation->set_rules('db_lang', 'db_lang', 'required');
       $this->form_validation->set_rules('email_lang', 'email_lang', 'required');

       if($this->form_validation->run()!=false){
        $lang_name=$this->input->post('lang_name');
        $data['name']=$lang_name;
        $this->languages_model->insert($data);
        if(!check_exist_dir(APPPATH.'language/'.$lang_name)){
          mkdir(APPPATH.'language/'.$lang_name);
        };
        $msg='<?php '. $this->input->post('string') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/msg_lang.php',$msg);

        $form_validation_lang='<?php '. $this->input->post('form_validation_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/form_validation_lang.php',$form_validation_lang);

        $imglib_lang='<?php '. $this->input->post('imglib_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/imglib_lang.php',$imglib_lang);

        $upload_lang='<?php '. $this->input->post('upload_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/upload_lang.php',$upload_lang);

        $db_lang='<?php '. $this->input->post('db_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/db_lang.php',$db_lang);

        $email_lang='<?php '. $this->input->post('email_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/email_lang.php',$email_lang);
      }
    }

    $data['heading']=$this->lang->line('msg_add_language');
    $lang_string=read_file(APPPATH.'language/'.$this->config->item('language').'/msg_lang.php');
    $data['lang_string']=str_replace('<?php', '', $lang_string);
    $data['lang_string']=str_replace('?>', '', $data['lang_string']);

    $lang_string=read_file(APPPATH.'language/'.$this->config->item('language').'/form_validation_lang.php');
    $data['form_validation_lang']=str_replace('<?php', '', $lang_string);
    $data['form_validation_lang']=str_replace('?>', '', $data['form_validation_lang']);

    $lang_string=read_file(APPPATH.'language/'.$this->config->item('language').'/imglib_lang.php');
    $data['imglib_lang']=str_replace('<?php', '', $lang_string);
    $data['imglib_lang']=str_replace('?>', '', $data['imglib_lang']);

    $lang_string=read_file(APPPATH.'language/'.$this->config->item('language').'/upload_lang.php');
    $data['upload_lang']=str_replace('<?php', '', $lang_string);
    $data['upload_lang']=str_replace('?>', '', $data['upload_lang']);

    $lang_string=read_file(APPPATH.'language/'.$this->config->item('language').'/db_lang.php');
    $data['db_lang']=str_replace('<?php', '', $lang_string);
    $data['db_lang']=str_replace('?>', '', $data['db_lang']);

    $lang_string=read_file(APPPATH.'language/'.$this->config->item('language').'/email_lang.php');
    $data['email_lang']=str_replace('<?php', '', $lang_string);
    $data['email_lang']=str_replace('?>', '', $data['email_lang']);

    $this->render_backend_tp('backends/languages/add',$data);
  }

  public function edit(){
    if(isset($_GET['id'])){
     $id=$this->input->get('id');
     if($id==null || !is_numeric($id) || $id<=0){
      redirect('notfound');
    }
    $data['obj']=$this->languages_model->get_by_id($id);

    if(isset($_POST['id_post'])){
      $id = $this->input->post('id_post');
      //$this->form_validation->set_rules('lang_name','lang_name', 'required|callback_check_name_exist_edit');
      $this->form_validation->set_rules('string', 'string', 'required');
      $this->form_validation->set_rules('form_validation_lang', 'form_validation_lang', 'required');
      $this->form_validation->set_rules('imglib_lang', 'imglib_lang', 'required');
      $this->form_validation->set_rules('upload_lang', 'upload_lang', 'required');
      $this->form_validation->set_rules('db_lang', 'db_lang', 'required');
      $this->form_validation->set_rules('email_lang', 'email_lang', 'required');

      if($this->form_validation->run()!=false){
      // $data['name']=$this->input->post('name');
       //$this->languages_model->update($data,array('id'=>$id));
        $this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));

     //  $lang_name=$this->input->post('lang_name');
     //  $data['name']=$lang_name;
     //  $this->languages_model->insert($data);
        $lang_name=$data['obj'][0]->name;
        if(!check_exist_dir(APPPATH.'language/'.$lang_name)){
          mkdir(APPPATH.'language/'.$lang_name);
        };

        $msg='<?php '. $this->input->post('string') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/msg_lang.php',$msg);

        $form_validation_lang='<?php '. $this->input->post('form_validation_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/form_validation_lang.php',$form_validation_lang);

        $imglib_lang='<?php '. $this->input->post('imglib_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/imglib_lang.php',$imglib_lang);

        $upload_lang='<?php '. $this->input->post('upload_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/upload_lang.php',$upload_lang);

        $db_lang='<?php '. $this->input->post('db_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/db_lang.php',$db_lang);

        $email_lang='<?php '. $this->input->post('email_lang') .'?>';
        write_file(APPPATH.'language/'.$lang_name.'/email_lang.php',$email_lang);

        redirect(base_url().'admin/languages/edit?id='.$id); 
      }
    }




    if($data['obj']==null){
     redirect('notfound');
   }

   $lang_string=read_file(APPPATH.'language/'.$data['obj'][0]->name.'/msg_lang.php');
   $data['lang_string']=str_replace('<?php', '', $lang_string);
   $data['lang_string']=str_replace('?>', '', $data['lang_string']);

   $lang_string=read_file(APPPATH.'language/'.$data['obj'][0]->name.'/form_validation_lang.php');
   $data['form_validation_lang']=str_replace('<?php', '', $lang_string);
   $data['form_validation_lang']=str_replace('?>', '', $data['form_validation_lang']);

   $lang_string=read_file(APPPATH.'language/'.$data['obj'][0]->name.'/imglib_lang.php');
   $data['imglib_lang']=str_replace('<?php', '', $lang_string);
   $data['imglib_lang']=str_replace('?>', '', $data['imglib_lang']);

   $lang_string=read_file(APPPATH.'language/'.$data['obj'][0]->name.'/upload_lang.php');
   $data['upload_lang']=str_replace('<?php', '', $lang_string);
   $data['upload_lang']=str_replace('?>', '', $data['upload_lang']);

   $lang_string=read_file(APPPATH.'language/'.$data['obj'][0]->name.'/db_lang.php');
   $data['db_lang']=str_replace('<?php', '', $lang_string);
   $data['db_lang']=str_replace('?>', '', $data['db_lang']);

   $lang_string=read_file(APPPATH.'language/'.$data['obj'][0]->name.'/email_lang.php');
   $data['email_lang']=str_replace('<?php', '', $lang_string);
   $data['email_lang']=str_replace('?>', '', $data['email_lang']);

   $data['heading']=$this->lang->line('msg_edit_language');
   $this->render_backend_tp('backends/languages/edit',$data);
 }else{
   redirect('notfound');
 }
}


public function check_name_exist_add($lang_name){
  $data=$this->languages_model->get_by_exact_name($lang_name, 0, 1);
  if ($data!=null)
  {
   $this->form_validation->set_message('check_name_exist_add', $this->lang->line('vl_feild_value_exist'));
   return FALSE;
 }
 else
 {
   return TRUE;
 }
}

public function check_name_exist_edit(){
  $id=$this->input->post('id_post');
  $name=$this->input->post('name');
  $data=$this->languages_model->get_by_name_and_diff_id($id,$name);
  if($data!=null) {
   $this->form_validation->set_message('check_name_exist_edit', $this->lang->line('vl_feild_value_exist'));
   return FALSE;
 } else {
   return TRUE;
 }
}

public function delete(){
  if(isset($_GET['id'])){
    $id=$this->input->get('id');
    if($id==null || !is_numeric($id) || $id<=0){
      redirect('notfound');
    }
    try {
     $data=$this->languages_model->get_by_id($id);
     if($data!=null){
       delete_dir(APPPATH.'language/'.$data[0]->name); 
       rmdir(APPPATH.'language/'.$data[0]->name);
     }
   } catch (Exception $e) {

   }
   $this->languages_model->remove_by_id($id);
   redirect('admin/languages');
 }else{
   redirect('notfound');
 }
}


function activate(){
  if(isset($_GET['id'])){
    $id=$this->input->get('id');
    $this->languages_model->update(array('activated'=>DEACTIVATED),array('activated'=>ACTIVATED));
    $this->languages_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
  }
  redirect('admin/languages');
}

function deactivate(){
  if(isset($_GET['id'])){
    $id=$this->input->get('id');
    $this->languages_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
  }
  redirect('admin/languages');
}

}
?>