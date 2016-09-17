<?php
include_once(APPPATH . 'core/Backend_Controller.php');
class banner extends Backend_Controller{


	function __construct()
 {
  parent::__construct();
  $user=$_SESSION['user'][0];
  if($user->perm==AGENT){
   redirect('admin/denied');
 }
 $this->load->model('banners_model');
 $this->load->helper('Ultils');
 $this->bk_menu = 17;
 $this->bk_title='Banner';
}

function index(){
  $base_url=base_url().'admin/banner';
  $page=$this->uri->segment(3);
  if(!is_numeric($page) || $page<=0){
   $page=1;
 }
 $first=($page-1)*$this->pg_per_page;
 $total_rows=$this->banners_model->total(array(),array());

 $data['list'] = $this->banners_model->get("*", array(),array(),$first,$this->pg_per_page, array('id' => 'DESC'));
 $data['page_link'] =parent::pagination_config($base_url,$total_rows,$this->pg_per_page);
 $data['heading']='Banner';
 $this->render_backend_tp('backends/banner/index',$data);
}


function create(){
  if(isset($_POST['title'])){
   $this->form_validation->set_rules('title','tiêu đề', 'trim|required|min_length[2]|xss_clean');
   $this->form_validation->set_rules('link','link', 'trim|required|min_length[2]|xss_clean');

   if($this->form_validation->run()!=false){
    $data['title']=$this->input->post('title');
    $data['link']=$this->input->post('link');
    $data['position']=$this->input->post('position');
    $insert_id=$this->banners_model->insert($data);
    if($insert_id!=0){
     if(!empty($_FILES['avt']['tmp_name'])){
      $filename=$_FILES['avt']['name'];
      $_FILES['avt']['name']=rename_upload_file($filename);
      $dir=create_dir_upload('uploads/banner/');
      $config['allowed_types'] = 'JPEG|jpg|JPG|png|gif';
      $config['max_size'] = '5000';
      $config['width']     = 100;
      $config['height']   = 100;
      $config['upload_path'] = $dir;
      $this->load->library('upload',$config);
      if (!$this->upload->do_upload('avt')){
       $this->session->set_flashdata('msg_failed',$this->upload->display_errors());
       redirect(base_url().'admin/banner/create');
     }else{
       $this->banners_model->update(array('path'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$insert_id));
     }
   }
   $this->session->set_flashdata('msg_ok',$this->lang->line('add_successfully'));
   redirect(base_url().'admin/banner/create');
 }
}
}
$data['heading']=$this->lang->line('msg_add');
$this->render_backend_tp('backends/banner/add',$data);
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
      $this->form_validation->set_rules('link','link', 'trim|required|min_length[2]|xss_clean');
      if($this->form_validation->run()){
        $data['title']=$this->input->post('title');
        $data['link']=$this->input->post('link');
        $data['position']=$this->input->post('position');
        $this->banners_model->update($data,array('id'=>$id));

        if(!empty($_FILES['avt']['tmp_name'])){
          $obj=$this->banners_model->get_by_id($id);
          try {
            unlink($obj[0]->path);
          } catch (Exception $e) {
            
          }
          $filename=$_FILES['avt']['name'];
          $_FILES['avt']['name']=rename_upload_file($filename);
          $dir=create_dir_upload('uploads/banners/');
          $config['allowed_types'] = 'JPEG|jpg|JPG|png';
          $config['max_size'] = '5000';
          $config['width']     = 100;
          $config['height']   = 100;
          $config['upload_path'] = $dir;
          $this->load->library('upload',$config);
          if (!$this->upload->do_upload('avt')){
            $this->session->set_flashdata('msg_failed',$this->upload->display_errors());
            redirect(base_url().'admin/banner/edit?id='.$id);  
          }else{
            $this->banners_model->update(array('path'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$id));
          }
        }

        $this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
        redirect(base_url().'admin/banner/edit?id='.$id);  
      }
    }

    $data['obj']=$this->banners_model->get_by_id($id);
    if($data['obj']==null){
      redirect('notfound');
    }
    $data['heading']=$this->lang->line('msg_edit');
    $this->render_backend_tp('backends/banner/edit',$data);
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
  $obj=$this->banners_model->get_by_id($id);
  try {
    unlink($obj[0]->path);
  } catch (Exception $e) {

  }
  $this->banners_model->remove_by_id($id);
  redirect('admin/banner');
}else{
 redirect('notfound');
}
}


function activate(){
  if(isset($_GET['id'])){
   $id=$this->input->get('id');
   $this->banners_model->update(array('activated'=>ACTIVATED),array('id'=>$id));
 }
 redirect('admin/banner');
}

function deactivate(){
  if(isset($_GET['id'])){
   $id=$this->input->get('id');
   $this->banners_model->update(array('activated'=>DEACTIVATED),array('id'=>$id));
 }
 redirect('admin/banner');
}

}
?>