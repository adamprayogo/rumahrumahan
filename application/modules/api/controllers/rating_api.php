<?php

require APPPATH . '/libraries/REST_Controller.php';

class rating_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('rating_model');
        $this->load->helper('Ultils');
    }

    function rating_get() {
        $this->load->model('rating_model');
        $estates_id = $this->get('estates_id');
        $first = $this->get('first');
        $offset = $this->get('offset');
        $order = array('rating.created_date' => 'DESC');
        $where = array('estates_id' => $estates_id);
        $group_by = array('estates_id');
        $total_rating = $this->rating_model->total($where, $group_by);
        $data = array('total_rating' => "$total_rating");
        if ($data != null) {
            $this->response([$data]);
        } else {
            $this->response(array('empty' => 'empty_data'));
        }
    }

    function rating_post() {
        $id = $this->post('id');
        if (isset($_FILES['avt'])) {
            $config['upload_path'] = 'uploads/avts';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|GIF|PNG';
            $config['max_size'] = '2000';
            $this->load->library('upload', $config);
            $filename = $_FILES['avt']['name'];
            $_FILES['avt']['name'] = rename_upload_file($filename);
            if ($this->upload->do_upload('avt')) {
                try {
                    $user = $this->rating_model->get_by_id($id);
                    unlink($user[0]->avt);
                } catch (Exception $e) {
                    
                }
                $image_path = 'uploads/avts/' . $_FILES['avt']['name'];
                $data = array('avt' => $image_path);
                $this->rating_model->update($data, array('id' => $id));
            }
        }
        $phone = $this->post('phone');
        $address = $this->post('address');
        $user = $this->rating_model->get_by_exact_phone_and_diff_id($id, $phone);
        if ($user == null) {
            if ($user == null) {
                $data = array('phone' => $phone, 'address' => $address);
                $this->rating_model->update($data, array('id' => $id));
                $this->response($this->rating_model->get_by_id($id));
                exit();
            }
        }
        $this->response(array('empty' => 'empty_data'));
    }

    function rating_put() {
        $data = array('this not available');
        $this->response($data);
    }

    function rating_delete() {
        $data = array('this not available');
        $this->response($data);
    }

//	function user_avg_rate_get(){
//		$user_id=$this->get('user_id');
//		$this->load->model('rating_model');
//		$rating = $this->rating_model->get_by_user_estates_id($user_id);
//		if($rating!=null){
//			$this->response(array("rating"=>$rating));
//		}else{
//			$this->response(array("rating"=>null));
//		}	
//	}
}

?>