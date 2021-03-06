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

    function total($array_where, $group_by = false) {
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
        return $rows[0]->total_rating;
    }

    function get_by_estates_id($id) {
        $select = '*';
        $array_where = array('estates_id' => $id);
        $this->db->from('rating');
        $order_by = array();
        return $this->get($select, $array_where, false, false, false, $order_by);
    }

}
