<?php

class home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('type_model');
        $this->load->model('cities_model');
        $this->load->model('county_model');
        $this->load->model('estates_model');
    }

    function index() {
        $this->load->helper('form');
        $this->ft_menu = 0;
        $this->ft_title = $this->lang->line('msg_home');
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
        if ($item_id == NULL) {
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
            if ($item_id != '') {
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
                redirect('notfound');
            }
        }
    }

}

?>