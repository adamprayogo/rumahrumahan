<?php

class home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('type_model');
        $this->load->model('cities_model');
        $this->load->model('county_model');
        $this->load->model('estates_model');
        $this->load->model('subscribe_user_model');
    }

    function index() {
        $this->load->helper('form');
        $this->ft_menu = 0;
        $this->ft_title = $this->lang->line('msg_home') . ' - Rumaqu.com';
        $data['type_list'] = $this->type_model->get("*", array('activated' => ACTIVATED), false, false, false, array('name' => 'ASC'));
//        $this->load->library('encrypt');
//        $data['url']=$this->encrypt->encode('testing url');
        $data['cities_list'] = $this->cities_model->get("cities.name as cities_name, cities.id as cities_id, county.name as county_name, county.id as county_id", false, false, false, false, array('county.name' => 'ASC', 'cities.name' => 'ASC'));
        $this->render_frontend_tp('frontends/index', $data);
    }

    function contact() {
        $this->ft_menu = 3;
        $this->ft_title = $this->lang->line('msg_contact');
        if (isset($_POST['full_name'])) {
            $this->form_validation->set_rules('subject', $this->lang->line('subject'), 'trim|required|min_length[5]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('full_name', $this->lang->line('msg_full_name'), 'trim|required|min_length[5]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('msg_email'), 'trim|valid_email|required|min_length[5]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('phone', $this->lang->line('msg_phone'), 'numeric|trim|required|min_length[5]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('content', $this->lang->line('msg_content'), 'trim|required|min_length[5]|max_length[500]|xss_clean');
            if ($this->form_validation->run()) {
                $data['full_name'] = $this->input->post('full_name');
                $data['email'] = $this->input->post('email');
                $data['phone'] = $this->input->post('phone');
                $data['content'] = $this->input->post('content');
                $data['subject'] = $this->input->post('subject');
                $this->contact_model->insert($data);
                $this->session->set_flashdata('msg_ok', $this->lang->line('contact_sent'));
                redirect(base_url() . 'home/contact');
            }
        }
        $this->render_frontend_tp('frontends/contact');
    }

    function search($item_id = NULL) {
        if (
                isset($_POST['category']) &&
                isset($_POST['type']) &&
                isset($_POST['cities']) &&
                isset($_POST['price'])) {
            $this->ft_title = 'Search Page - Rumaqu.com';
            $this->form_validation->set_rules('category', 'category', 'trim|required|xss_clean');
            $this->form_validation->set_rules('type', 'type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('cities', 'cities', 'trim|required|xss_clean');
            if ($this->form_validation->run()) {
                $category = $this->input->post('category');
                $type = $this->input->post('type');
                $cities = $this->input->post('cities');
                $price_range = explode(';', $this->input->post('price'));
                $where = array(
                    'purpose' => $category,
                    'types_id' => $type,
                    'cities_id' => $cities,
                    'price >=' => $price_range[0],
                    'price <=' => $price_range[1]
                );
                $data['src_result'] = $this->estates_model->get("*,purpose,estates.id as id,estates.activated as activated, (SUM(rating.value)/COUNT(*)) as total_rating,COUNT(*) AS total_user", $where, false, false, $this->pg_per_page, array('estates.id' => 'DESC'), array("estates.id"));
                $data['price_1'] = $price_range[0];
                $data['price_2'] = $price_range[1];
                $data['type'] = $type;
                $data['cities'] = $cities;
                $data['category'] = $category;
                $data['type_list'] = $this->type_model->get("*", array('activated' => ACTIVATED), false, false, false, array('name' => 'ASC'));
                $data['cities_list'] = $this->cities_model->get("cities.name as cities_name, cities.id as cities_id, county.name as county_name, county.id as county_id", false, false, false, false, array('county.name' => 'ASC', 'cities.name' => 'ASC'));
                $this->render_frontend_tp('frontends/search', $data);
            }
        } else {
            if ($item_id != NULL) {
                $id = $item_id;
                $data['obj'] = $this->estates_model->get_by_id($id);
                $this->load->model('rating_model');
                $data['total_rating'] = $this->rating_model->total_rating(array('estates_id' => $id));
                $data['total_user'] = $this->rating_model->total_user_rating(array('estates_id' => $id));
                $data['user_rating'] = $this->rating_model->user_rating(array('estates_id' => $id), array('value'));
                $this->load->model('estates_amenities_model');
                $data['amenities_check'] = $this->estates_amenities_model->get_by_estates_id($id);
                $this->load->model('images_model');
                $data['images'] = $this->images_model->get_by_estates_id($id);
                $this->load->model('cities_model');
                $data['cities'] = $this->cities_model->get_by_county_id($data['obj'][0]->county_id);
                if ($data['obj'] == null) {
                    redirect('home');
                }
                $this->ft_title = $data['obj'][0]->title . ' - Rumaqu.com';
                $this->render_frontend_tp('frontends/item', $data);
            } else {
                redirect('home');
            }
        }
    }

    function subscribe() {
        $status = 0;
        if (
                isset($_POST['categories']) &&
                isset($_POST['types']) &&
                isset($_POST['cities']) &&
                isset($_POST['price']) &&
                isset($_POST['name']) &&
                isset($_POST['phone']) &&
                isset($_POST['email'])
        ) {
            $this->form_validation->set_rules('categories', 'categories', 'trim|required|xss_clean');
            $this->form_validation->set_rules('types', 'types', 'trim|required|xss_clean');
            $this->form_validation->set_rules('cities', 'cities', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'required|xss_clean|valid_email|callback_check_subscribe_email_exist_add');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|max_length[30]|xss_clean');
            $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]|max_length[60]|xss_clean|');

            if ($this->form_validation->run()) {
                $data['categories'] = $this->input->post('categories');
                $data['types'] = $this->input->post('types');
                $data['cities'] = $this->input->post('cities');
                $data['email'] = $this->input->post('email');
                $data['phone'] = $this->input->post('phone');
                $data['name'] = $this->input->post('name');
                $price_range = explode(';', $this->input->post('price'));
                $data['price_1'] = $price_range[0];
                $data['price_2'] = $price_range[1];
                $data['update_url'] = substr(md5($this->config->item('encryption_key') . $data['email'] . uniqid(rand(), true)), 0, 20);
                $insert_id = $this->subscribe_user_model->insert($data);
                if ($insert_id != 0) {
                    $dataSubscribe = $this->subscribe_user_model->get('subscribe_user.*,types.name as types_name,cities.name as cities_name,county.name as county_name', array('email' => $data['email'], 'active' => 1));
                    $this->load->helper('email_ultils');
                    $this->load->helper('currency');
                    if (KOSAN == intval($data['categories'])) {
                        $category = 'Kosan';
                    } else if (RUSUN == intval($data['categories'])) {
                        $category = 'Rusun';
                    } else if (KONTRAKAN == intval($data['categories'])) {
                        $category = 'Kontrakan';
                    }
                    $sendEmail = send_welcome_subscribe_email($category, $dataSubscribe[0]->types_name, $dataSubscribe[0]->cities_name, $dataSubscribe[0]->county_name, $dataSubscribe[0]->name, $dataSubscribe[0]->phone, $dataSubscribe[0]->email, format_money($dataSubscribe[0]->price_1, ".", ",", "Rp. "), format_money($dataSubscribe[0]->price_2, ".", ",", "Rp. "), $dataSubscribe[0]->update_url);
                    if ($sendEmail) {
                        $status = 1;
                    } else {
                        $status = 2;
                    }
                }
            }
        }
        echo json_encode(array("status" => $status));
    }

    function checking_newsletter() {
        $query = '
            SELECT dat_subu.* , hn.id as hist_id
            FROM (
                SELECT es.id AS estates_id, es.image_path AS estates_img, es.title AS estates_title, es.address AS estates_address, es.price AS estates_price, subu.id AS subu_id,subu.name AS subu_name,subu.email AS subu_email 
                FROM estates es
                    LEFT JOIN (
                        SELECT su.*,t.name AS types_name, ci.name AS cities_name ,co.id AS county_id ,co.name AS county_name 
                        FROM subscribe_user su
                        LEFT JOIN types t ON t.id = su.types
                        LEFT JOIN cities ci ON ci.id = su.cities
                        JOIN county co ON co.id = ci.county_id
                    ) AS subu ON subu.cities = es.cities_id AND subu.types = es.types_id AND subu.categories = es.purpose AND es.price>=subu.price_1 AND es.price <= subu.price_2
                WHERE subu.id IS NOT NULL AND subu.active=1
            )AS dat_subu
            LEFT JOIN  hist_newsletter hn ON hn.subscribe_id = dat_subu.subu_id AND hn.estates_id = dat_subu.estates_id
            WHERE hn.id IS NULL';
        $send_newsletter = $this->subscribe_user_model->get_by_query($query);
        if ($send_newsletter != null) {
            $this->load->model('estates_amenities_model');
            $this->load->helper('email_ultils');
            $first_email = $send_newsletter[0]->subu_email;
            $first_name = $send_newsletter[0]->subu_name;
            $array_estates = array();
            $idx_newsletter = 0;
            foreach ($send_newsletter as $to_email) {
                $list_amenities = '';
                $amenities_check = $this->estates_amenities_model->get_by_estates_id($to_email->estates_id);
                if ($amenities_check != null) {
                    foreach ($amenities_check as $amenities) {
                        $list_amenities.=$amenities->name . ',';
                    }
                } else {
                    $list_amenities = 'Do not have facilities yet ';
                }
                array_push($array_estates, array(
                    'estates_id' => $to_email->estates_id,
                    'estates_img' => $to_email->estates_img,
                    'estates_title' => $to_email->estates_title,
                    'estates_address' => $to_email->estates_address,
                    'estates_amenities' => substr($list_amenities, 0, -1),
                    'estates_price' => $to_email->estates_price
                ));

                if ($idx_newsletter != sizeof($send_newsletter) - 1) {
                    if ($send_newsletter[$idx_newsletter]->subu_email != $send_newsletter[$idx_newsletter + 1]->subu_email) {
                        $dataSubscribe = $this->subscribe_user_model->get('subscribe_user.*,types.name as types_name,cities.name as cities_name,county.name as county_name', array('email' => $to_email->subu_email));
                        send_newsletter_email($to_email->subu_email, $to_email->subu_name, $array_estates, $dataSubscribe[0]->update_url);
                        $array_estates = array();
                    }
                } else {
                    $dataSubscribe = $this->subscribe_user_model->get('subscribe_user.*,types.name as types_name,cities.name as cities_name,county.name as county_name', array('email' => $to_email->subu_email));
                    send_newsletter_email($to_email->subu_email, $to_email->subu_name, $array_estates, $dataSubscribe[0]->update_url);
                }
                echo $this->subscribe_user_model->insert_history(array('subscribe_id'=>$to_email->subu_id,'estates_id'=>$to_email->estates_id));
                $idx_newsletter++;
            }
            $this->render_frontend_tp('frontends/redirect');
        }
    }

    function requpsub() {
        $status = 0;
        if (isset($_POST['email'])) {
            $this->form_validation->set_rules('email', 'required|xss_clean|valid_email');
            if ($this->form_validation->run()) {
                $email = $this->input->post('email');
                $this->load->helper('email_ultils');
                $generated_url = substr(md5($this->config->item('encryption_key') . $email . uniqid(rand(), true)), 0, 20);
                $resUpdate = $this->subscribe_user_model->update(array('update_url' => $generate_url), array('email' => $email));
                if ($resUpdate > 0) {
                    $sendUpdate = send_update_preference_newsletter($email, $generated_url);
                    if ($sendUpdate) {
                        $status = 1;
                    }
                }
            }
        }
        echo json_encode(array("status" => $status, "generated_url" => $generate_url));
    }

    function upref() {
        //request form update
        if (
                isset($_GET['v']) &&
                isset($_GET['url']) &&
                isset($_GET['email'])
        ) {
            $generated_url = $this->input->get('url');
            $email = $this->input->get('email');
            $data_update = $this->subscribe_user_model->get('subscribe_user.*', array('email' => $email, 'update_url' => $generated_url, 'active' => 1));
            if ($data_update != null) {
                $data['data_update'] = $data_update;
                $this->load->helper('form');
                $this->ft_title = 'Update Preferences- Rumaqu.com';
                $data['type_list'] = $this->type_model->get("*", array('activated' => ACTIVATED), false, false, false, array('name' => 'ASC'));
                $data['cities_list'] = $this->cities_model->get("cities.name as cities_name, cities.id as cities_id, county.name as county_name, county.id as county_id", false, false, false, false, array('county.name' => 'ASC', 'cities.name' => 'ASC'));
                $this->render_frontend_tp('frontends/index', $data);
            } else {
                $this->document_expired();
            }
        } else if (isset($_POST)) {
            if (isset($_POST['category']) &&
                    isset($_POST['type']) &&
                    isset($_POST['cities']) &&
                    isset($_POST['name']) &&
                    isset($_POST['email']) &&
                    isset($_POST['url'])) {
                $this->form_validation->set_rules('category', 'category', 'trim|required|xss_clean');
                $this->form_validation->set_rules('type', 'type', 'trim|required|xss_clean');
                $this->form_validation->set_rules('cities', 'cities', 'trim|required|xss_clean');
                $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', 'email', 'required|xss_clean|valid_email');
                if ($this->form_validation->run()) {
                    $category = $this->input->post('category');
                    $type = $this->input->post('type');
                    $cities = $this->input->post('cities');
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $url = $this->input->post('url');
                    $price_range = explode(';', $this->input->post('price'));
                    $update_generate_url = substr(md5($this->config->item('encryption_key') . $email . uniqid(rand(), true)), 0, 20);
                    $data_array = array(
                        'name' => $name,
                        'email' => $email,
                        'categories' => $category,
                        'types' => $type,
                        'cities' => $cities,
                        'price_1' => $price_range[0],
                        'price_2' => $price_range[1],
                        'update_url' => $update_generate_url
                    );
                    $response_update = $this->subscribe_user_model->update($data_array, array('email' => $email, 'update_url' => $url));
                    if ($response_update > 0) {
                        $dataSubscribe = $this->subscribe_user_model->get('subscribe_user.*,types.name as types_name,cities.name as cities_name,county.name as county_name', array('email' => $email));
                        $this->load->helper('email_ultils');
                        $this->load->helper('currency');
                        if (KOSAN == intval($dataSubscribe[0]->categories)) {
                            $category = 'Kosan';
                        } else if (RUSUN == intval($dataSubscribe[0]->categories)) {
                            $category = 'Rusun';
                        } else if (KONTRAKAN == intval($dataSubscribe[0]->categories)) {
                            $category = 'Kontrakan';
                        }
                        $sendEmail = send_req_update_preferences_success($category, $dataSubscribe[0]->types_name, $dataSubscribe[0]->cities_name, $dataSubscribe[0]->county_name, $dataSubscribe[0]->name, $dataSubscribe[0]->phone, $dataSubscribe[0]->email, format_money($dataSubscribe[0]->price_1, ".", ",", "Rp. "), format_money($dataSubscribe[0]->price_2, ".", ",", "Rp. "), $dataSubscribe[0]->update_url);

                        if ($sendEmail) {
                            $data['status'] = 1;
                            $data['message'] = 'Your criteria has been updated, you will be redirect about <b id="countdown">5</b> Seconds.';
                            $redirect_url = base_url();
                        } else {
                            $data['status'] = 2;
                            $data['message'] = 'There is something wrong while update your criteria please try again, you will be redirect about <b id="countdown">5</b> Seconds.';
                            $data['generated_url'] = 'upref?v=u&email=' . $dataSubscribe[0]->email . '&url=' . $dataSubscribe[0]->update_url;
                            $redirect_url = $data['generated_url'];
                        }
                        $data['submessage'] = '<a href="' . $redirect_url . '">Click here if browser not redirect automatically.</a>';
                        $this->render_frontend_tp('frontends/redirect', $data);
                    }
                }
            } else {
                redirect('notfound');
            }
        } else {
            redirect('notfound');
        }
    }

    function unsub() {
        if (
                isset($_GET['url']) &&
                isset($_GET['email'])
        ) {
            $url = $this->input->get('url');
            $email = $this->input->get('email');
            $delete_result = $this->subscribe_user_model->remove(array('email' => $email, 'update_url' => $url));
            if ($delete_result > 0) {
                $data['status'] = 1;
                $data['message'] = 'Thank you for using our subscription hope you enjoy it, you will be redirect about <b id="countdown">5</b> Seconds.';
                $redirect_url = base_url();
            }
            $data['submessage'] = '<a href="' . $redirect_url . '">Click here if browser not redirect automatically.</a>';
            $this->render_frontend_tp('frontends/redirect', $data);
        }
    }

    function check_subscribe_email_exist_add($email) {
        $data = $this->subscribe_user_model->get_by_exact_email($email);
        if ($data != null) {
            //$this->form_validation->set_message('check_subscribe_email_exist_add', $this->lang->line('vl_feild_value_exist'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function document_expired() {
        $data['status'] = 1;
        $data['message'] = 'Document has been expired, you will be redirect about <b id="countdown">5</b> Seconds.';
        $redirect_url = base_url();
        $data['submessage'] = '<a href="' . $redirect_url . '">Click here if browser not redirect automatically.</a>';
        $this->render_frontend_tp('frontends/redirect', $data);
    }

}

?>