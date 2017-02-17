<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Model {

    function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'user_id';
    }

    public function checkUser($data = array()) {
        $this->db->select("*");
        $this->db->from($this->tableName);
        $this->db->where(array('email' => $data['email'], 'status' => 1, 'oauth_uid' => $data['id']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        $user_data = array();
        if ($prevCheck > 0) {

            $prevResult = $prevQuery->row_array();

            $user_data['last_login'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName, $user_data, array('user_id' => $prevResult['user_id']));
            $userID = $prevResult['user_id'];
            $this->session->set_userdata($prevResult);
        } else {
            $user_data["oauth_uid"] = $data['id'];
            $user_data['Username'] = $data['first_name'] . " " . $data['last_name'];
            $user_data['email'] = $data["email"];
            $user_data['status'] = 1;
            $user_data['created_date'] = date("Y-m-d H:i:s");
            $user_data['last_login'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName, $user_data);
            $userID = $this->db->insert_id();
            $this->session->set_userdata($user_data);
        }

        return $userID ? $userID : FALSE;
    }

    function is_logged_in() {
        // Get current CodeIgniter instance
        $CI = & get_instance();
        // We need to use $CI->session instead of $this->session
        $user = $CI->session->userdata('oauth_uid');
        if (!isset($user)) {
            return false;
        } else {
            return true;
        }
    }

}
