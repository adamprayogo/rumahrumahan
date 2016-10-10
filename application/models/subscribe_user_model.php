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
        $data_array['updated_at'] = date('Y-m-d H:i:s');
        $data_array['active'] = 1;
        if ($this->get_by_exact_email($data_array['email']) == null) {
            $data_exist = $this->is_email_exist($data_array['email']);
            if ($data_exist == null) {
                $data_array['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('subscribe_user', $data_array);
                return $this->db->insert_id();
            } else {
                $this->update($data_array, array('id' => $data_exist[0]->id));
                return $data_exist[0]->id;
            }
        } else {
            return 0;
        }
    }

    function get_by_query($query) {
        $query = $this->db->query($query);
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $query->free_result();
            return $data;
        } else {
            return null;
        }
    }

    function is_email_exist($email) {
        $select = 'subscribe_user.*';
        $like = array();
        $where = array('email' => $email, 'active' => 0);
        $order_by = array();
        return $this->get($select, $where, $like, 0, 1, $order_by);
    }

    function get_by_exact_email($email) {
        $select = '*';
        $like = array();
        $where = array('email' => $email, 'active' => 1);
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

    function update($array_data, $where) {
        $array_data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where($where);
        $this->db->update('subscribe_user', $array_data);
        return $this->db->affected_rows();
    }

    public function remove($arr_where) {
        $this->db->where($arr_where);
        $array_data['updated_at'] = date('Y-m-d H:i:s');
        $array_data['active'] = 0;
        $this->db->update('subscribe_user', $array_data);
//        $this->db->delete('subscribe_user'); // do not deleted we still used data users
        return $this->db->affected_rows();
    }

    PUBLIC function insert_history($data_array) {
        $data_array['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('hist_newsletter', $data_array);
        return $this->db->insert_id('hist_newsletter',$data_array);
    }

}

?>