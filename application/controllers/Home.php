<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('feeds');
        $this->load->model('category');
    }

    public function index() {
      
        $data['main_content'] = 'map';
        $this->load->view('template/template', $data);
    }

    public function allFeeds() {


        $data['feed_data'] = $this->feeds->getFeedsData();
        echo json_encode($data['feed_data']);
    }

}
