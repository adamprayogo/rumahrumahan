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
        $status = 0;
        if (
                isset($_POST['user_id']) &&
                isset($_POST['estates_id']) &&
                isset($_POST['comment_title']) &&
                isset($_POST['comment_desc']) &&
                isset($_POST['value'])
        ) {
            $user_id = $this->post('user_id');
            $estates_id = $this->post('estates_id');
            $comment_title = $this->post('comment_title');
            $comment_desc = $this->post('comment_desc');
            $value = $this->post('value');
            $this->load->model('rating_model');
            $total_rating = $this->rating_model->get_by_user_id_and_estates_id($user_id, $estates_id);
            if ($total_rating != null) {
                $where['user_id'] = $user_id;
                $where['estates_id'] = $estates_id;
                $this->rating_model->update(array('value' => $value, 'comment_title' => $comment_title, 'comment_desc' => $comment_desc), $where);
                $status = 1;
            } else {
                $insert_id = $this->rating_model->insert(
                        array(
                            'value' => $value,
                            'user_id' => $user_id,
                            'estates_id' => $estates_id,
                            'comment_desc' => $comment_desc,
                            'comment_title' => $comment_title)
                );
                if ($insert_id != 0) {
                    $status = 1;
                }
            }
//            $rating = $this->rating_model->get_total_rating_by_estates_id($estates_id);
            $this->response(array('status' => "$status"));
            //$this->product_model->update(array('rate'=>$rating),array('id'=>$estates_id));
        }
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