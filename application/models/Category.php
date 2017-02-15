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
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where('status', 1);
        $catQuery = $this->db->get();
        $catCheck = $catQuery->num_rows();
        $catResult = array();
        if ($catCheck > 0) {

            $catResult = $catQuery->row_array();
        }
        return $catResult;
    }

}
