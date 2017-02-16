<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feed extends CI_Model {

    function __construct() {
        $this->tableName = 'newsfeed';
        $this->primaryKey = 'tt_feed_id';
    }

    /**
     * get all feed data          
     * @returns array feeds data  
     */
    public function getFeedsData($limit_start = null, $limit_end = null) {

        $sql = "SELECT f.*,c.category_name AS category FROM newsfeed AS f "
                . "LEFT JOIN categories AS c ON(f.tt_category = c.category_id) "
                . "WHERE f.tt_publishstatus!=''  "
                . "ORDER BY f.tt_updated_time DESC";
        if (($limit_start) || ($limit_start != null)) {
            $end_limit = ($limit_end <= 0) ? "" : "," . $limit_end;
            $sql .= " LIMIT " . $limit_start . $end_limit;
        }


        $query = $this->db->query($sql);
        $data = $query->result_array();

        return !empty($data) ? $data : array();
    }

    /**
     * Save feed data
     * @param feed data         
     * @returns boolean  
     */
    public function saveFeed($feed_data = array()) {
        if (!empty($feed_data)) {

            $data["tt_image"] = (isset($feed_data["upload_data"]["file_name"]) && !empty($feed_data["upload_data"]["file_name"])) ? $feed_data["upload_data"]["file_name"] : "";
            $data["tt_lat"] = (isset($feed_data["tt_lat"]) && !empty($feed_data["tt_lat"])) ? $feed_data["tt_lat"] : "";
            $data["tt_lng"] = (isset($feed_data["tt_lng"]) && !empty($feed_data["tt_lng"])) ? $feed_data["tt_lng"] : "";
            $data["tt_comments"] = (isset($feed_data["tt_comment"]) && !empty($feed_data["tt_comment"])) ? $feed_data["tt_comment"] : "";
            $data["tt_category"] = (isset($feed_data["tt_category"]) && !empty($feed_data["tt_category"])) ? $feed_data["tt_category"] : 0;
            $data["tt_address"] = (isset($feed_data["tt_address"]) && !empty($feed_data["tt_address"])) ? $feed_data["tt_address"] : "";
            $data["tt_timestamp"] = date('Y-m-d H:i:s');
            $data["tt_updated_time"] = date('Y-m-d H:i:s');
            $data['tt_publishstatus'] = (isset($feed_data["tt_publishstatus"]) && !empty($feed_data["tt_publishstatus"])) ? $feed_data["tt_publishstatus"] : 0;


            if ($feed_id = $this->db->insert($this->tableName, $data)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    /**
     * delete feed data
     * @param feed id         
     * @returns boolean  
     */
    public function deleteFeed($feed_id = 0) {
        if ($feed_id > 0) {

            $this->db->delete($this->tableName, array($this->primaryKey => $feed_id));
            return true;
        }
        return false;
    }

    /**
     * Count the number of rows
     * @param int $search_string
     * @param int $order
     * @return int
     */
    function getCountFeeds() {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where("tt_publishstatus != ", "");

        $query = $this->db->get();
        return $query->num_rows();
    }

}
