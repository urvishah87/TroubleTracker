<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Model {

    function __construct() {
        $this->tableName = 'categories';
        $this->primaryKey = 'category_id';
    }

    /**
     * get list of categories      
     * @returns array categories   
     */
    public function getAllCategories() {
        $this->db->select(array($this->primaryKey,"category_name"));
        $this->db->from($this->tableName);
        $this->db->where('status', 1);
        $catQuery = $this->db->get();
        $catCheck = $catQuery->num_rows();
        $catResult = array();
        if ($catCheck > 0) {

            $catResult = $catQuery->result_array();
        }
        return $catResult;
    }

}
