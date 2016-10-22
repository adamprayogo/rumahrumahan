<?php

//include_once(APPPATH . 'core/Backend_Controller.php');
class estates extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('estates_model');
        $this->load->helper('Ultils');
        $this->bk_menu = 1;
    }

    function index() {
        parent::authentication_backend();
        $base_url = base_url() . 'admin/estates';
        $page = $this->uri->segment(3);
        if (!is_numeric($page) || $page <= 0) {
            $page = 1;
        }
        $first = ($page - 1) * $this->pg_per_page;
        $total_rows = $this->estates_model->total(array(), array());
        $data['list'] = $this->estates_model->get("*,estates.id as id,estates.activated as activated", array(), array(), $first, $this->pg_per_page);
        $data['page_link'] = parent::pagination_config($base_url, $total_rows, $this->pg_per_page);
        $data['heading'] = $this->lang->line('msg_estates');
        $this->render_backend_tp('backends/estates/index', $data);
    }

    public function create() {
        parent::authentication_backend();
        $this->load->model('county_model');
        $data['county'] = $this->county_model->get();
        $this->load->model('type_model');
        $data['types'] = $this->type_model->get('*', array('activated' => ACTIVATED, 'type' => 1, 'parent_id' => 0));
        $this->load->model('marker_model');
        $data['marker'] = $this->marker_model->get();
        $this->load->model('amenities_model');
        $data['amenities'] = $this->amenities_model->get();
        $data['heading'] = $this->lang->line('msg_add');
        $this->render_backend_tp('backends/estates/add', $data);
    }

    public function remote_add() {
        if (!isset($_SESSION['user'])) {
            //login to continue
            echo json_encode(array('ok' => 2));
            exit();
        }

        $user = $_SESSION['user'];
        if ($user[0]->perm == USER || $user[0]->perm == AGENT) {
            $this->load->model('users_model');
            $obj = $this->users_model->get_by_id($user[0]->id);
            if (($obj[0]->posted >= $obj[0]->max_post) || (strtotime($obj[0]->expr_time) < strtotime(date("Y-m-d")))) {
                echo json_encode(array('ok' => 10));
                exit();
            }
        }

        if (isset($_POST['title'])) {
            $title = $this->input->post('title');
            $bathrooms = $this->input->post('bathrooms');
            $bedrooms = $this->input->post('bedrooms');
            $types = $this->input->post('types');
            $content = strip_tags(nl2br($this->input->post('content')), '<br>'); //preg_replace('/[\r\n]+/', "", 
            $county = $this->input->post('county');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $price = $this->input->post('price');
            $purpose = $this->input->post('purpose');
            $address = $this->input->post('address');
            $status = $this->input->post('status');
            $activated = $this->input->post('activate');
            $featured = $this->input->post('featured');
            $time_rate = $this->input->post('time_rate');
            $cities_id = $this->input->post('cities');
            $area = $this->input->post('area');
            $marker = $this->input->post('marker');
            $description = strip_tags(nl2br($this->input->post('content')), '<br>'); //$this->input->post('description');
            $keyword = $this->input->post('keyword');
            $link_youtube = $this->input->post('link_youtube');
            $user = $_SESSION['user'][0];
            if (isset($_POST['types'])) {
                $types_array = array();
                $types = $_POST['types'];
                foreach ($types as $id) {
                    array_push($types_array, $id);
                }
                $types_string = implode(',', $types_array);
            }
            $data_array = array(
                'title' => $title,
                'bathrooms' => $bathrooms,
                'bedrooms' => $bedrooms,
                'types_id' => $types_string,
                'content' => $content,
                'county_id' => $county,
                'lat' => $lat,
                'lng' => $lng,
                'price' => $price,
                'purpose' => str_replace(',', '', $purpose),
                'address' => $address,
                'user_id' => $user->id,
                'cities_id' => $cities_id,
                'area' => $area,
                'marker_id' => $marker,
                'description' => $description,
                'keyword' => $keyword,
                'link_youtube' => $link_youtube,
                'featured' => $featured
            );

            if ($activated != null) {
                $data_array['activated'] = $activated;
            }
            if ($status != null) {
                $data_array['status'] = $status;
            }
            if ($time_rate != null) {
                $data_array['time_rate'] = $time_rate;
            }

            $estates_id = $this->estates_model->insert($data_array);
            if ($estates_id != 0) {
                if (isset($_POST['amen'])) {
                    $amenities = $_POST['amen'];
                    $this->load->model('estates_amenities_model');
                    foreach ($amenities as $id) {
                        $data_array = array('estates_id' => $estates_id, 'amenities_id' => $id);
                        $this->estates_amenities_model->insert($data_array);
                    }
                }
                echo json_encode(array('ok' => 1));
            } else {
                echo json_encode(array('ok' => 0));
            }
        } else {
            echo json_encode(array('ok' => 0));
        }
    }

    public function check_username_exist_add($name) {
        $data = $this->estates_model->get_by_exact_name($name, 0, 1);
        if ($data != null) {
            $this->form_validation->set_message('check_username_exist_add', $this->lang->line('vl_feild_value_exist'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_username_exist_edit() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $data = $this->estates_model->get_by_name_and_diff_id($id, $name);
        if ($data != null) {
            $this->form_validation->set_message('check_username_exist_edit', $this->lang->line('vl_feild_value_exist'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function edit_get() {
        parent::authentication_backend();
        if (isset($_GET['id'])) {
            $id = $this->input->get('id');
            $this->load->model('county_model');
            $data['county'] = $this->county_model->get();
            $this->load->model('type_model');
            $data['types'] = $this->type_model->get('*', array('activated' => ACTIVATED, 'type' => 1));
            $data['obj'] = $this->estates_model->get_by_id($id);
            $this->load->model('amenities_model');
            $data['amenities'] = $this->amenities_model->get();
            $this->load->model('estates_amenities_model');
            $data['amenities_check'] = $this->estates_amenities_model->get_by_estates_id($id);
            $this->load->model('images_model');
            $data['images'] = $this->images_model->get_by_estates_id($id);
            $this->load->model('marker_model');
            $data['marker'] = $this->marker_model->get();
            $this->load->model('cities_model');
            $data['cities'] = $this->cities_model->get_by_county_id($data['obj'][0]->county_id);
            if ($data['obj'] == null) {
                redirect('notfound');
            }
            $data['heading'] = $this->lang->line('msg_edit');
            $this->render_backend_tp('backends/estates/edit', $data);
        } else {
            redirect('notfound');
        }
    }

    public function remote_edit() {
        if (!isset($_SESSION['user'])) {
            //need login to continue
            echo json_encode(array('ok' => 2));
            exit();
        }
        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $bathrooms = $this->input->post('bathrooms');
            $bedrooms = $this->input->post('bedrooms');
            $types = $this->input->post('types');
            $content = strip_tags(nl2br($this->input->post('content')), '<br>');
            $county = $this->input->post('county');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $price = $this->input->post('price');
            $purpose = $this->input->post('purpose');
            $status = $this->input->post('status');
            $activated = $this->input->post('activate');
            $featured = $this->input->post('featured');
            $time_rate = $this->input->post('time_rate');
            $address = $this->input->post('address');
            $cities_id = $this->input->post('cities');
            $area = $this->input->post('area');
            $marker = $this->input->post('marker');
            $description = strip_tags(nl2br($this->input->post('content')), '<br>');
            $keyword = $this->input->post('keyword');
            $link_youtube = $this->input->post('link_youtube');


            $data_array = array(
                'title' => $title,
                'bathrooms' => $bathrooms,
                'bedrooms' => $bedrooms,
                'content' => $content,
                'county_id' => $county,
                'lat' => $lat,
                'lng' => $lng,
                'price' => $price,
                'address' => $address,
                'purpose' => $purpose,
                'cities_id' => $cities_id,
                'area' => $area,
                'marker_id' => $marker,
                'description' => $description,
                'keyword' => $keyword,
                'link_youtube' => $link_youtube,
                'featured' => $featured
            );

            if (isset($_POST['types'])) {
                $types_array = array();
                $types = $_POST['types'];
                foreach ($types as $id2) {
                    array_push($types_array, $id2);
                }
                $types_string = implode(',', $types_array);
                $data_array['types_id'] = $types_string;
            }

            if ($activated != null) {
                $data_array['activated'] = $activated;
            }
            if ($status != null) {
                $data_array['status'] = $status;
            } else {
                $data_array['status'] = null;
            }

            if ($time_rate != null) {
                $data_array['time_rate'] = $time_rate;
            } else {
                $data_array['time_rate'] = -1;
            }
            var_dump($data_array);
            $this->estates_model->update($data_array, array('id' => $id));
            //echo $this->db->last_query();
            if (isset($_POST['amen'])) {
                $amenities = $_POST['amen'];
                $this->load->model('estates_amenities_model');
                $this->estates_amenities_model->remove_by_estates_id($id);
                $estates_id = $id;
                foreach ($amenities as $id) {
                    $data_array = array('estates_id' => $estates_id, 'amenities_id' => $id);
                    $this->estates_amenities_model->insert($data_array);
                }
            }
            echo json_encode(array('ok' => 1));
            $data['obj'] = $this->estates_model->get_by_id($id);
        } else {
            echo json_encode(array('ok' => 0));
        }
    }

    public function delete() {
        parent::authentication_backend();
        if (isset($_GET['id'])) {
            $id = $this->input->get('id');
            $estates = $this->estates_model->get_by_id($id);
            if ($estates != null) {
                $this->load->model('images_model');
                $images = $this->images_model->get_by_estates_id($id);
                foreach ($images as $r) {
                    try {
                        unlink($r->path);
                        unlink($r->thumb_path);
                        $this->images_model->remove_by_id($r->id);
                    } catch (Exception $e) {
                        
                    }
                }
            }
            $is_delete = $this->estates_model->delete_by_id($id);
            if ($is_delete > 0) {
                $this->load->model('rating_model');
                $delete_rating = $this->rating_model->delete_by_estates_id($id);
            }
        }
    }

    public function activated() {
        parent::authentication_backend();
        if (isset($_GET['id'])) {
            $id = $this->input->get('id');
            echo $id;
            $this->estates_model->update(array('activated' => 1), array('id' => $id));
        }
        redirect('admin/estates');
    }

    public function deactivated() {
        parent::authentication_backend();
        if (isset($_GET['id'])) {
            $id = $this->input->get('id');
            $this->estates_model->update(array('activated' => 0), array('id' => $id));
        }
        redirect('admin/estates');
    }

    public function search() {
        parent::authentication_backend();
        if (isset($_GET['query'])) {
            $query = $this->input->get('query');
            $page = $this->input->get('page') ? $this->input->get('page') : 0;
            $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;
            $order = $this->input->get('order') ? $this->input->get('order') : 'DESC';
            $config['total_rows'] = $this->estates_model->total(array(), array('title' => $query));
            $config['base_url'] = base_url() . 'index.php/admin/estates/search?order=' . $order . '&query=' . $query;
            $config['per_page'] = $per_page;
            $data['msg_label'] = $this->config->item('msg_label');
            $this->pagination->initialize($config);
            $data['list'] = $this->estates_model->get_by_name($query, $page, $per_page);
            $data['page_link'] = $this->pagination->create_links();
            $data['search_title'] = 'Result search for "' . $query . '"';
            $this->render_backend_tp('backends/estates/index', $data);
        }
    }

}

?>