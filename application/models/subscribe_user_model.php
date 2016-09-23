<?php

/**

 *

 */
class subscribe_user_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($select = "*", $where = false, $like = false, $first = false, $offset = false, $order_by = false) {
        $data = array();
        if ($order_by != false) {
            $order = key($order_by);
            if ($order != null) {
                $sort = $order_by[$order];
                $this->db->order_by($order, $sort);
            }
        }

        $this->db->select($select);
        $this->db->from('subscribe_user');
        if ($where != false)
            $this->db->where($where);
        if ($like != false)
            $this->db->like($like);
        if ($offset != false) {
            $this->db->limit($offset, $first);
        }
        $this->db->join('types', 'types.id= subscribe_user.types', 'left');
        $this->db->join('cities', 'cities.id=subscribe_user.cities', 'left');
        $this->db->join('county', 'county.id=cities.county_id');
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

    function insert($data_array) {
        $data_array['created_at'] = date('Y-m-d H:i:s');
        $data_array['updated_at'] = date('Y-m-d H:i:s');
        if ($this->get_by_exact_email($data_array['email']) == null) {
            $this->db->insert('subscribe_user', $data_array);
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function get_by_exact_email($name) {
        $select = '*';
        $like = array();
        $where = array('email' => $name);
        $order_by = array();
        return $this->get($select, $where, $like, 0, 1, $order_by);
    }

    function get_by_exact_email_and_diff_id($id, $name) {
        $select = '*';
        $like = array();
        $where = array('email' => $name, 'id <>' => $id);
        $order_by = array();
        return $this->get($select, $where, $like, 0, 1, $order_by);
    }

    public function remove($arr_where) {
        $this->db->where($arr_where);
        $this->db->delete('subscribe_user');
        return $this->db->affected_rows();
    }

    public function remove_by_id($id) {
        $where = array('id' => $id);
        return $this->remove($where);
    }

}

?>