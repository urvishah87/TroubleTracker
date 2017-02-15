<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feeds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('feed');
        $this->load->model('category');
    }

    public function index() {
      
        $data['main_content'] = 'feeds';
        $data['feeds']=$this->feed->getFeedsData();
        $this->load->view('template/template', $data);
    }

//    public function allFeeds() {
//
//
//        $data['feed_data'] = $this->feeds->getFeedsData();
//        echo json_encode($data['feed_data']);
//    }

}
