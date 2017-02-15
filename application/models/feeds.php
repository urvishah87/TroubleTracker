<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feeds extends CI_Model {

    function __construct() {
        $this->tableName = 'newsfeed';
        $this->primaryKey = 'tt_feed_id';
    }

    /**
     * get all feed data          
     * @returns array feeds data  
     */
    public function getFeedsData() {
        $sql = "SELECT f.*,c.category_name AS category FROM newsfeed AS f "
                . "LEFT JOIN categories AS c ON(f.tt_category = c.category_id) "
                . "WHERE f.tt_publishstatus!=''  "
                . "ORDER BY f.tt_updated_time ";



        $query = $this->db->query($sql);
        $data = $query->result_array();

        return !empty($data) ? $data : array();
    }

}
