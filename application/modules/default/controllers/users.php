<?php
  /**
  * 
  */
  class Users extends MY_Controller
  {
  	
  	function __construct()
  	{
  		parent::__construct();
      $this->load->model('users_model');
      $this->load->helper('Ultils');
    }

    function login(){
      if(isset($_SESSION['user'])){
       redirect(base_url());
     }
     $view_data=null;
     if(isset($_POST['user_name']) && isset($_POST['pwd'])){
      $this->form_validation->set_rules('user_name',$this->lang->line('msg_user_name'), 'trim|required|xss_clean');
      $this->form_validation->set_rules('pwd',$this->lang->line('msg_pwd'), 'trim|required|xss_clean');
      if($this->form_validation->run()!=false){
        $user_name=$_POST['user_name'];
        $pwd=$_POST['pwd'];
        $this->load->model('users_model');
        $this->load->helper('ultils');
        $data=$this->users_model->get_by_username_and_pwd($user_name,encrypt_pwd($pwd));
        if($data!=null){
          $_SESSION['user']=$data;
          $update_data=array(      
            'updated_at'=>date('Y-m-d H:i:s',time()),
            'ip'=>$_SERVER['REMOTE_ADDR']
            );
          $this->users_model->update($update_data,array('id'=>$data[0]->id));
          redirect(base_url());
        }else{
          $view_data['error_msg']='<span class="help-inline msg-error" generated="true">'.$this->lang->line('msg_login_failed').'</span>';
        }
      }

    }
    $this->render_frontend_tp('frontends/login',$view_data);
  }

  function register(){
    if(isset($_SESSION['user'])){
      redirect(base_url());
    }

    if(isset($_POST['user_name'])){
      $this->form_validation->set_rules('user_name','username', 'trim|required|min_length[5]|max_length[60]|xss_clean|callback_check_username_exist_add');
      $this->form_validation->set_rules('pwd','pwd', 'trim|required|min_length[5]|max_length[60]|xss_clean');
      $this->form_validation->set_rules('full_name','full name', 'trim|required|min_length[5]|max_length[60]|xss_clean');
      $this->form_validation->set_rules('email','email', 'required|xss_clean|valid_email|callback_check_email_exist_add');
      //$this->form_validation->set_rules('address','address', 'trim|required|min_length[5]|max_length[60]|xss_clean');
      $this->form_validation->set_rules('phone','phone', 'min_length[10]|max_length[60]|xss_clean');
      if($this->form_validation->run()!=false){
        $data['user_name']=$this->input->post('user_name');
        $data['pwd']=encrypt_pwd($this->input->post('pwd'));
        $data['full_name']=$this->input->post('full_name');
        $email=$this->input->post('email');
        $data['email']=$email;
        $data['phone']=$this->input->post('phone');
        $data['address']=$this->input->post('address');
        $data['activated']=DEACTIVATED;
        $activation_code=md5($email.time());
        $data['activation_code']=$activation_code;
        $insert_id=$this->users_model->insert($data);
        if($insert_id!=0){
          $this->load->helper('email_ultils');
          send_verified_mail($activation_code,$email);
          $this->render_frontend_tp('frontends/users/activating_notify',null);
        }
      }
    }else{
    $this->render_frontend_tp('frontends/register',null);
  }
  }



  function send_enquiry(){
    if(isset($_POST['email'])){
      $this->load->model('spam_model');
      $reply_to=$this->input->post('reply_to');
      $email=$this->input->post('email');
      $message=$this->input->post('content');
      $user_name=$this->input->post('name');
      $data=$this->spam_model->get_by_sender_and_receiver($reply_to,$email);
      $this->load->helper('email_ultils');
      if($data!=null){
        if((time()-strtotime($data[0]->updated_at))>120){
          send_enquiry($message,$email,$reply_to,$user_name);
          $insert_data['sender']=$reply_to;
          $insert_data['receiver']=$email;
          $insert_data['content']=$message;
          $this->spam_model->insert($insert_data);
          //$this->response(array('ok'=>'1'));
          echo json_encode(array('ok'=>1));
          exit();
        }else{
          //block send email, display error
          //$this->response(array('ok'=>'0'));
          echo json_encode(array('ok'=>'0'));
          exit();
        }
      }else{
        send_enquiry($message,$email,$reply_to,$user_name);
        $insert_data['sender']=$reply_to;
        $insert_data['receiver']=$email;
        $insert_data['content']=$message;
        $this->spam_model->insert($insert_data);
        //$this->response(array('ok'=>'1'));
        echo json_encode(array('ok'=>'1'));
        exit();
      }
    } 
  }

  function activation(){
   $code=$this->input->get('code');
   if($code==null){
    redirect('notfound');
  }
  $data=$this->users_model->get_by_activation_code($code);
  if($data!=null){
    if($data[0]->activated!=BAN){
      $this->users_model->update(
       array('activated'=>ACTIVATED,'activation_code'=>NULL),
       array('email'=>$data[0]->email)
       );
      $this->render_frontend_tp('frontends/users/success_activation','default', null);
    }else{
      //something wrong
      $this->render_frontend_tp('frontends/users/error_activation','default', null);
    }
  }else{
      //something wrong
   $this->render_frontend_tp('frontends/users/error_activation','default', null);
 }
}


public function profile(){
  parent::authentication_frontend();
  $this->ft_menu=5;
  $data['obj'] = $_SESSION['user'];
  $this->render_frontend_tp('frontends/users/profile', $data);
}

public function update_profile(){
  parent::authentication_frontend();
  $this->ft_menu=5;
  $user=$_SESSION['user'][0];
  if(!empty($_FILES['avt']['tmp_name'])){
    $filename=$_FILES['avt']['name'];
    $_FILES['avt']['name']=rename_upload_file($filename);
    $dir=create_dir_upload('uploads/avts/');
    $config['allowed_types'] = 'JPEG|jpg|JPG|png';
    $config['max_size'] = '1000';
    $config['width']     = 100;
    $config['height']   = 100;
    $config['upload_path'] = $dir;
    $this->load->library('upload',$config);
    if (!$this->upload->do_upload('avt')){
     $this->session->set_flashdata('msg_failed',$this->upload->display_errors());
     redirect(base_url().'users/update_profile');
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
              "source_image" => $dir.'/'.$_FILES['avt']['name'], //get original image
              "new_image" =>  $dir, //save as new image //need to create thumbs first
              "width" => 100,
              "height" => 100,
              'master_dim'=>'height'
              );
    $this->load->library('image_lib',$config);
    $this->image_lib->resize();
    $this->users_model->update(array('avt'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$user->id));
  }
}

$this->form_validation->set_rules('full_name','full name', 'trim|required|min_length[5]|max_length[60]|xss_clean');
$this->form_validation->set_rules('email','email', 'trim|required|min_length[5]|max_length[60]|xss_clean|valid_email|callback_check_email_exist_edit');
$this->form_validation->set_rules('phone','phone', 'trim|xss_clean|min_length[10]|max_length[60]|');
if($this->form_validation->run()){
  $update_data['full_name']=$this->input->post('full_name');
  $update_data['email'] = $this->input->post('email');
  $update_data['address'] =$this->input->post('address');
  $update_data['skype']=$this->input->post('skype');
  $update_data['phone']=$this->input->post('phone');
  $this->users_model->update($update_data,array('id'=>$user->id));
  $this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
  redirect(base_url().'users/update_profile');
}
$data['obj']=$this->users_model->get_by_id($user->id);
$_SESSION['user']=$data['obj'];
$this->render_frontend_tp('frontends/users/update_profile', $data);
}

public function update_pwd(){

  parent::authentication_frontend();
  $this->ft_menu=5;
  $user=$_SESSION['user'][0];
  $this->form_validation->set_rules('old_pwd','old password', 'trim|min_length[5]|required|xss_clean');
  $this->form_validation->set_rules('new_pwd','new password', 'trim|min_length[5]|required|xss_clean');
  $this->form_validation->set_rules('cfm_pwd','confirm password', 'trim|min_length[5]|required|xss_clean|callback_pwd_check_equal_less['.$this->input->post('new_pwd').']');
  if($this->form_validation->run()){
    $old_pwd=$this->input->post('old_pwd');
    if(encrypt_pwd($old_pwd)!=$user->pwd){
      $this->session->set_flashdata('msg_failed',$this->lang->line('edit_failed'));
      redirect(base_url().'users/update_pwd');
    }else{
      $new_pwd=$this->input->post('new_pwd');
      $update_data['pwd']=encrypt_pwd($new_pwd);
      $this->users_model->update($update_data,array('id'=>$user->id));
      $this->session->set_flashdata('msg_ok',$this->lang->line('edit_successfully'));
      redirect(base_url().'users/update_pwd');
    }
  }
  $data['obj']=$this->users_model->get_by_id($user->id);
  $_SESSION['user']=$data['obj'];
  $this->render_frontend_tp('frontends/users/update_pwd', $data);
}

function check_username_exist_add($name){
  $data=$this->users_model->get_by_exact_name($name);
  if ($data!=null)
  {
    $this->form_validation->set_message('check_username_exist_add', $this->lang->line('vl_feild_value_exist'));
    return FALSE;
  }
  else
  {
    return TRUE;
  }
}

public function check_email_exist_add($email){
  $data=$this->users_model->get_by_exact_email($email);
  if ($data!=null)
  {
    $this->form_validation->set_message('check_email_exist_add', $this->lang->line('vl_feild_value_exist'));
    return FALSE;
  }
  else
  {
    return TRUE;
  }
}

public function check_email_exist_edit(){
  $id=$this->input->post('id');
  $name=$this->input->post('email');
  $data=$this->users_model->get_by_exact_email_and_diff_id($id ,$name);
  if($data!=null) {
    $this->form_validation->set_message('check_email_exist_edit', $this->lang->line('vl_feild_value_exist'));
    return FALSE;
  } else {
    return TRUE;
  }
}


public function pwd_check_equal_less($second_field,$first_field)
{
  $new_pwd=$this->input->post('new_pwd');
  $cfm_pwd=$this->input->post('cfm_pwd');
  if ($new_pwd!=$cfm_pwd)
  {
    $this->form_validation->set_message('pwd_check_equal_less', $this->lang->line('vl_equal_less'));
    return false;       
  }
  else
  {
    return true;
  }
}

function logout(){
  if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
  }
  redirect(base_url().'users/login');
}

//new update january
function choose_package(){
 parent::authentication_frontend();
 $this->load->model('packages_model');
 $data['list']=$this->packages_model->get();
 $this->render_frontend_tp('frontends/users/choose_package',$data);
}

}
?>