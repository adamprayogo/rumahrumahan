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
                $data['src_result'] = $this->estates_model->get("*,purpose,estates.id as id,estates.activated as activated, (SUM(rating.value)/COUNT(*)) as total_rating", $where, false, false, $this->pg_per_page, array('estates.id' => 'DESC'), array("estates.id"));
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
//                $data['heading'] = $this->lang->line('msg_edit');
//                $this->render_backend_tp('backends/estates/edit', $data);
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
                $insert_id = $this->subscribe_user_model->insert($data);
                if ($insert_id != 0) {
                    $status = 1;
                    $dataSubscribe = $this->subscribe_user_model->get('subscribe_user.*,types.name as types_name,cities.name as cities_name,county.name as county_name');
                    $this->load->helper('email_ultils');
                    $this->load->helper('currency');
                    $category = (KOSAN == $data['categories']) ? 'Kostan' : (KONTRAKAN == $data['categories']) ? 'Kontrakan' : (RUSUN == $data['categories']) ? 'Rusun' : false;
                    send_welcome_subscribe_email($category, $dataSubscribe[0]->types_name, $dataSubscribe[0]->cities_name, $dataSubscribe[0]->county_name, $dataSubscribe[0]->name, $dataSubscribe[0]->phone, $dataSubscribe[0]->email, format_money($dataSubscribe[0]->price_1, ".", ",", "Rp. "), format_money($dataSubscribe[0]->price_2, ".", ",", "Rp. "));
//                    send_verified_code('asAsc092','srachmandani@gmail.com');
                }
            }
        }
        echo json_encode(array("status" => $status));
    }

    public function check_subscribe_email_exist_add($email) {
        $data = $this->subscribe_user_model->get_by_exact_email($email);
        if ($data != null) {
            //$this->form_validation->set_message('check_subscribe_email_exist_add', $this->lang->line('vl_feild_value_exist'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>