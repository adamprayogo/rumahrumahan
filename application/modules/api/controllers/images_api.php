<?php

require APPPATH . '/libraries/REST_Controller.php';

<<<<<<< HEAD
	function images_post() 
	{ 		
		$this->load->model('estates_model');
		$this->load->helper('Ultils');
		if(isset($_FILES['photo']) && isset($_POST['id'])){
			$id=$this->input->post('id');
			$dir=create_dir_upload('uploads/');
			$thumb_dir= create_thumb_dir_upload($dir.'/thumbs');
			$filename=$_FILES['photo']['name'];
			$_FILES['photo']['name']=rename_upload_file($filename);
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|GIF|PNG';
			$config['max_size']	= '5000';
			$config['upload_path']=$dir;
			$this->load->library('upload',$config);
			if ($this->upload->do_upload('photo'))
			{
				$this->load->model('images_model');
				$data['path']=$dir.'/'.$_FILES['photo']['name'];
				$original_path=$data['path'];
				$data['estates_id']=$id;
				$images_id = $this->images_model->insert($data);
				$config=array(
                            "source_image" => $dir.'/'.$_FILES['photo']['name'], //get original image
							"new_image" =>  $thumb_dir, //save as new image //need to create thumbs first
							"width" => 970,
							"height" => 900,
							'master_dim'=>'height'
							);
				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
				$image_path= $thumb_dir.'/'.$_FILES['photo']['name'];
				$data=null;
				$data['thumb_path']=$image_path;
				$this->estates_model->update(array('image_path'=>$image_path), array('id'=>$id));
				$this->images_model->update($data,array('id'=>$images_id));
				$return_data=array(
					'ok'=>1,
					'thumb_path'=>$image_path,
					'estates_id'=>$id,
					'id'=>$images_id,
					'path'=>$original_path
					);
				$this->response($return_data);
			}
			else
			{
				$this->response(array('ok'=>0));
			}
		}
	} 
=======
class images_api extends REST_Controller {
>>>>>>> bb43978e63145bdf39884a20a01f9fc05e5464ad

    public function __construct() {
        parent::__construct();
        $this->load->model('images_model');
    }

    function images_get() {
        $where = array();
        $like = array();
        $order = array('created_at' => 'DESC');
        $data = $this->images_model->get();
        $estate_id = $this->get('estate_id');
        if ($estate_id != null) {
            $where['estates_id'] = $estate_id;
        }
        $data = $this->images_model->get("*", $where, $like, false, false, $order);
        if ($data != null) {
            $this->response($data);
        } else {
            $this->response(array('empty' => 'empty_data'));
        }
    }

    function images_post() {
        $this->load->model('estates_model');
        $this->load->helper('Ultils');
        if (isset($_FILES['photo']) && isset($_POST['id'])) {
            $id = $this->input->post('id');
            $dir = create_dir_upload('uploads/');
            $thumb_dir = create_thumb_dir_upload($dir . '/thumbs');
            $filename = $_FILES['photo']['name'];
            $_FILES['photo']['name'] = rename_upload_file($filename);
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|GIF|PNG';
            $config['max_size'] = '5000';
            $config['upload_path'] = $dir;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {
                $this->load->model('images_model');
                $data['path'] = $dir . '/' . $_FILES['photo']['name'];
                $original_path = $data['path'];
                $data['estates_id'] = $id;
                $images_id = $this->images_model->insert($data);
                $config = array(
                    "source_image" => $dir . '/' . $_FILES['photo']['name'], //get original image
                    "new_image" => $thumb_dir, //save as new image //need to create thumbs first,
                    "create_thumb"=>TRUE,
                    "thumb_marker"=>TRUE,
                    "maintain_ratio"=>TRUE,
                    "width" => 270,
                    "height" => 200,
                    'master_dim' => 'height'
                );
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image_path = $thumb_dir . '/' . $_FILES['photo']['name'];
                $data = null;
                $data['thumb_path'] = $image_path;
                $this->estates_model->update(array('image_path' => $image_path), array('id' => $id));
                $this->images_model->update($data, array('id' => $images_id));
                $return_data = array(
                    'ok' => 1,
                    'thumb_path' => $image_path,
                    'estates_id' => $id,
                    'id' => $images_id,
                    'path' => $original_path
                );
                $this->response($return_data);
            } else {
                $this->response(array('ok' => 0));
            }
        }
    }

    function images_put() {
        $data = array('this not available');
        $this->response($data);
    }

    function images_delete() {
        $data = array('this not available');
        $this->response($data);
    }

    function remove_post() {
        if (isset($_POST['estates_id']) && isset($_POST['data_id'])) {
            $id = $this->input->post('data_id');
            $estates_id = $this->input->post('estates_id');
            $data = $this->images_model->get_by_id($id);
            if ($data != null) {
                try {
                    unlink($data[0]->thumb_path);
                    unlink($data[0]->path);
                    $this->load->model('estates_model');
                    $estates = $this->estates_model->get_by_id($estates_id);
                    if ($estates[0]->image_path == $data[0]->thumb_path) {
                        $this->estates_model->update(array('image_path' => NULL), array('id' => $estates_id));
                    }
                    $this->images_model->remove_by_id($id);
                } catch (Exception $e) {
                    echo $e;
                }
            }
        }
    }

    function set_thumbnail_post() {
        if (isset($_POST['thumb_path']) && isset($_POST['estates_id'])) {
            $thumb_path = $this->input->post('thumb_path');
            $estates_id = $this->input->post('estates_id');
            $this->load->model('estates_model');
            $this->estates_model->update(array('image_path' => $thumb_path), array('id' => $estates_id));
        }
        //echo "ád";
    }

}

?>