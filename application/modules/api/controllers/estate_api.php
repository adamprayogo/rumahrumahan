<?php

require APPPATH . '/libraries/REST_Controller.php';

class estate_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('estates_model');
        $this->load->helper('Ultils');
    }

    function estates_get() {
        $where = '`estates`.`activated`=1 AND `users`.`activated`=' . ACTIVATED;
        $first = $this->get('first');
        $offset = $this->get('offset');
        if ($first == null) {
            $first = 0;
        }

        if ($offset == null) {
            $offset = 1;
        }

        $like = array();
        $order = array('estates.updated_at' => 'DESC');
        $types = $this->get('types_id');
        $sort_by = $this->get('sort_by');
        $user_id = $this->get('user_id');
        $min_price = $this->input->get('min_price');
        $max_price = $this->input->get('max_price');
        $purpose = $this->input->get('purpose');
        $cities = $this->input->get('cities');
        $county = $this->input->get('county');
        $area = $this->input->get('area');
        $bedrooms = $this->input->get('bedrooms');
        $properties_id = $this->get('estate_id');
        $status = $this->get('status');
        $featured = $this->get('featured');
        $request = $this->get('req');

        if ($user_id != null) {
            $where.=' AND `estates`.`user_id`=' . $user_id;
        }
        if ($featured != null) {
            $where.=' AND `estates`.`featured`=' . $featured;
        }
        if ($status != null) {
            $where.=' AND `estates`.`status`=' . $status;
        }

        if ($properties_id != null && is_numeric($properties_id)) {
            $where.=' AND `estates`.`id`=' . $properties_id;
        }

        if ($county != null && is_numeric($county) && $county > 0) {
            $where.=' AND `estates`.`county_id`=' . $county;
        }

        if ($types != null && is_numeric($types) && $types > 0) {
            $where.=' AND FIND_IN_SET(' . $types . ',estates.types_id)!=0';
        }

        if ($cities != null && is_numeric($cities) && $cities > 0) {
            $where.=' AND `estates`.`cities_id`=' . $cities;
        }

        if ($area != null && is_numeric($area)) {
            $where.=' AND `estates`.`area`=' . $area;
        }

        if ($bedrooms != null && is_numeric($bedrooms)) {
            $where.=' AND `estates`.`bedrooms`=' . $bedrooms;
        }

        if ($purpose != null && is_numeric($purpose)) {
            $where.=' AND `estates`.`purpose`=' . $purpose;
        }

        if ($min_price != null && $max_price != null) {
            if ($min_price != null && $min_price > 0 && is_numeric($min_price) && $max_price != null && $max_price > 0 && is_numeric($max_price)) {
                $where.=' AND `price` BETWEEN ' . $min_price;
                $where.=' AND ' . $max_price;
            }
        } else {
            if ($min_price != null && $min_price > 0 && is_numeric($min_price)) {
                $where.=' AND `estates`.`price`=' . $min_price;
            }
            if ($max_price != null && $max_price > 0 && is_numeric($max_price)) {
                $where.=' AND `estates`.`price`=' . $max_price;
            }
        }

        if ($request != null && $request = 'vrating') {
            $order_by = ' total_rating DESC ';
        } else {
            $order_by = ' `estates`.`created_at` DESC ';
        }

        $select = 'SELECT * , 
		`estates`.`created_at` AS created_at,
		`estates`.`updated_at` AS updated_at,
		`types`.`name` AS type_name,
		`county`.`name` AS county_name,
		`cities`.`name` AS cities_name,
		`estates`.`address` AS address,
		`estates`.`id` AS id,
		`estates`.`user_id` as user_id,
                `users`.`full_name` as full_name,
                CASE 
                    WHEN FORMAT(SUM(`rating`.`value`)/COUNT(*),1) IS NOT NULL 
                    THEN FORMAT(SUM(`rating`.`value`)/COUNT(*),1)
                    ELSE 0 
                END AS total_rating,
                COUNT(*) AS total_user';

        $query = $select . ' FROM
			(`estates`)
			LEFT JOIN `types` ON `estates`.`types_id` = `types`.`id`
			LEFT JOIN `county` ON `estates`.`county_id` = `county`.`id`
			LEFT JOIN `users` ON `estates`.`user_id` = `users`.`id`
			LEFT JOIN `cities` ON `estates`.`cities_id` = `cities`.`id`
			LEFT JOIN `marker` ON `estates`.`marker_id` = `marker`.`id`
                        LEFT JOIN `rating` ON `estates`.`id` = `rating`.`estates_id`
			WHERE ' . $where . ' GROUP BY `estates`.`id`
                        ORDER BY ' . $order_by . '
                        LIMIT ' . $first . ',' . $offset;
        $data = $this->estates_model->get_by_query($query);
        if ($data != null) {
            $this->estates_model->update_visitor($properties_id);
            $this->response($data);
        } else {
            $this->response(array("empty" => 1));
        }
    }

    function estates_post() {
        if (isset($_POST['title'])) {
            $title = $this->input->post('title');
            $bathrooms = $this->input->post('bathrooms');
            $bedrooms = $this->input->post('bedrooms');
            $content = $this->input->post('content'); //preg_replace('/[\r\n]+/', "", htmlspecialchars($this->input->post('content')));
            $county = $this->input->post('county');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $price = $this->input->post('price');
            $purpose = $this->input->post('purpose');
            $address = $this->input->post('address');
            $status = $this->input->post('status');
            $activated = $this->input->post('activate');
            $time_rate = $this->input->post('time_rate');
            $cities_id = $this->input->post('cities');
            $area = $this->input->post('area');
            $marker = $this->input->post('marker');
            $keyword = $this->input->post('keyword');
            $link_youtube = $this->input->post('link_youtube');
            if ($marker == -1) {
                $marker = null;
            }
            $description = $this->input->post('description');
            $user_id = $this->input->post('user_id');
            $types = $this->input->post('types');

            $data_array = array(
                'title' => $title,
                'bathrooms' => $bathrooms,
                'bedrooms' => $bedrooms,
                'types_id' => $types,
                'content' => $content,
                'county_id' => $county,
                'lat' => $lat,
                'lng' => $lng,
                'price' => $price,
                'purpose' => $purpose,
                'address' => $address,
                'user_id' => $user_id,
                'cities_id' => $cities_id,
                'area' => $area,
                'marker_id' => $marker,
                'description' => $description
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

    function nearby_get() {
        $lat = $this->get('lat');
        $lng = $this->get('lng');
        $radius = $this->get('radius');
        $where = '`estates`.`activated`=1 AND `users`.`activated`=' . ACTIVATED;
        //echo $lat;
        //echo $lng;
        $select = 'SELECT *,
		`estates`.`created_at` as created_at,
		`estates`.`updated_at` as updated_at,
		`types`.`name` as type_name,
		`county`.`name` as county_name,
		`cities`.`name` as cities_name,
		`estates`.`address` as address,
		`estates`.`id` as id,
		`estates`.`user_id` as user_id, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( lat ) ) ) )
		AS distance 
		FROM estates 
		JOIN `types` ON `estates`.`types_id` = `types`.`id`
		JOIN `county` ON `estates`.`county_id` = `county`.`id`
		JOIN `users` ON `estates`.`user_id` = `users`.`id`
		JOIN `cities` ON `estates`.`cities_id` = `cities`.`id`
		LEFT JOIN `marker` ON `estates`.`marker_id` = `marker`.`id`
		WHERE ' . $where . '
		HAVING distance < ' . $radius . ' ORDER BY distance LIMIT 0 , 20';
        $data = $this->estates_model->get_by_query($select);
        if ($data != null) {
            $this->response($data);
        } else {
            $this->response(array('ok' => 0));
        }
    }

    function estates_put() {
        $data = array('this not available');
        $this->response($data);
    }

    function del_get() {
//        $data = array('ok'=>0);
        if (isset($_GET['estates_id'])) {
            $properties_id = $this->input->get('estates_id');
            $estates = $this->estates_model->get_by_id($properties_id);
            if ($estates != null) {
                $this->load->model('images_model');
                $images = $this->images_model->get_by_estates_id($properties_id);
                if ($images != null) {
                    foreach ($images as $r) {
                        try {
                            unlink($r->path);
                            unlink($r->thumb_path);
                            $this->images_model->remove_by_id($r->id);
                        } catch (Exception $e) {
                            
                        }
                    }
                }
            }
        }
        $affect_row = $this->estates_model->remove_by_id($properties_id);
        if ($affect_row > 0) {
            $this->response(array('ok' => 1));
        } else {
            $this->response(array('ok' => 0));
        }
    }

    function amenities_get() {
        if (isset($_GET['id'])) {
            $id = $this->get('id');
            $this->load->model('estates_amenities_model');
            $data = $this->estates_amenities_model->get_by_estates_id($id);
            $this->response($data);
        } else {
            echo json_encode(array('ok' => 0));
        }
    }

    function update_post() {
        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            if (isset($_POST['title'])) {
                $title = $this->input->post('title');
                $bathrooms = $this->input->post('bathrooms');
                $bedrooms = $this->input->post('bedrooms');
                $types = $this->input->post('types');
                $content = $this->input->post('content');
                $county = $this->input->post('county');
                $lat = $this->input->post('lat');
                $lng = $this->input->post('lng');
                $price = $this->input->post('price');
                $purpose = $this->input->post('purpose');
                $status = $this->input->post('status');
                $activated = $this->input->post('activate');
                $time_rate = $this->input->post('time_rate');
                $address = $this->input->post('address');
                $cities_id = $this->input->post('cities');
                $area = $this->input->post('area');
                $marker = $this->input->post('marker');
                $description = $this->input->post('content');
                $keyword = $this->input->post('keyword');
                $link_youtube = $this->input->post('link_youtube');

                $data_array = array(
                    'title' => $title,
                    'bathrooms' => $bathrooms,
                    'bedrooms' => $bedrooms,
                    'types_id' => $types,
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
                    'link_youtube' => $link_youtube
                );

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
                    $data_array['time_rate'] = null;
                }
            } else {
                //update if just lat lng 
                $lat = $this->input->post('lat');
                $lng = $this->input->post('lng');
                $data_array = array(
                    'lat' => $lat,
                    'lng' => $lng
                );
            }

            $this->estates_model->update($data_array, array('id' => $id));
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

    function comment_get() {
        $id = $this->input->get('id');
        if ($id != null) {
            $this->load->library('ultils');
            $obj = $this->estates_model->get_by_id($id);
            $data['link'] = base_url() . 'properties/detail/' . $id . '/' . url_title($obj[0]->title);
            $this->ultils->_load_view('comment', $data);
        } else {
            $this->ultils->_load_view('notfound');
        }
    }

    function video_get() {
        $link = $this->input->get('link');
        if ($link != null) {
            $this->load->library('ultils');
            $data['link'] = $this->input->get('link');
            $this->ultils->_load_view('youtube', $data);
        } else {
            $this->ultils->_load_view('notfound');
        }
    }

}

?>