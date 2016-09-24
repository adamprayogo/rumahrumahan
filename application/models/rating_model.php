<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class rating_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get($select = "*", $array_where = false, $array_like = false, $first = false, $offset = false, $order_by = false, $group_by) {
        $data = array();
        if ($order_by != false) {
            $order = key($order_by);
            if ($order != null) {
                $sort = $order_by[$order];
                $this->db->order_by($order, $sort);
            }
        }

        $this->db->select($select);
        $this->db->from('rating');
        if ($array_where != false)
            $this->db->where($array_where);
        if ($array_like != false)
            $this->db->like($array_like);
        if ($offset != false) {
            $this->db->limit($offset, $first);
        }
        if ($group_by != false) {
            $this->db->group_by($group_by);
        }
        $query = $this->db->get();
//        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = $rows;
            }
            $query->free_result();
            return $data;
        } else {
            return null;
        }
    }

    function total_rating($array_where, $group_by = false) {
        $this->db->select('(SUM(value)/COUNT(*)) as total_rating');
        $this->db->where($array_where);
        if ($group_by != false) {
            $this->db->group_by($group_by);
        }

        $this->db->from('rating');
        $query = $this->db->get();
//        echo $this->db->last_query();
        $rows = $query->result();
        $query->free_result();
        if ($rows != null) {
            return $rows[0]->total_rating;
        } else {
            return null;
        }
    }

    function total_user_rating($array_where, $group_by = false) {
        $this->db->select('COUNT(*) as total_user');
        $this->db->where($array_where);
        if ($group_by != false) {
            $this->db->group_by($group_by);
        }

        $this->db->from('rating');
        $query = $this->db->get();
        $rows = $query->result();
        $query->free_result();
        if ($rows != null) {
            return $rows[0]->total_user;
        } else {
            return null;
        }
    }

    function user_rating($array_where, $group_by = false) {
        $select = 'value, (count(value)) as total';
        $order_by = array("value" => 'DESC');
        return $this->get($select, $array_where, false, false, false, $order_by, $group_by);
    }

    function get_by_user_id_and_estates_id($user_id, $estates_id) {
        $select = '*';
        $array_where = array('user_id' => $user_id, 'estates_id' => $estates_id);
        $array_like = array();
        $order_by = array();
        return $this->get($select, $array_where, $array_like, false, false, $order_by);
    }

    function get_total_rating() {
        $this->db->select('(SUM(value)/COUNT(*)) as total_rating');
        $this->db->from('rating');
        $query = $this->db->get();
        $rows = $query->result();
        $query->free_result();
        return $rows[0]->total_rating;
    }

    function get_total_rating_by_estates_id($id) {
        $this->db->select('(SUM(value)/COUNT(*)) as total_rating');
        $this->db->where(array('estates_id' => $id));
        $this->db->from('rating');
        $query = $this->db->get();
        $rows = $query->result();
        $query->free_result();
        return $rows[0]->total_rating;
    }

    function insert($data_array) {
        $data_array['created_at'] = date('Y-m-d H:i:s');
        $data_array['updated_at'] = date('Y-m-d H:i:s');
        $this->db->insert('rating', $data_array);
        return $this->db->insert_id();
    }

    public function remove($arr_where) {
        $this->db->where($arr_where);
        $this->db->delete('rating');
        return $this->db->affected_rows();
    }

    public function remove_by_id($id) {
        $array_where = array('id' => $id);
        return $this->remove($array_where);
    }

    function update($data_array, $array_where) {
        $this->db->where($array_where);
        $data_array['created_date'] = date('Y-m-d H:i:s');
        $data_array['updated_date'] = date('Y-m-d H:i:s');
        $this->db->update('rating', $data_array);
    }

    function get_by_estates_id($id) {
        $select = '*';
        $array_where = array('estates_id' => $id);
        $this->db->from('rating');
        $order_by = array();
        return $this->get($select, $array_where, false, false, false, $order_by);
    }

}
