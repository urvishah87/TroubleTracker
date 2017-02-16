<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feeds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('feed');
        $this->load->model('category');
    }

    public function index() {

        //pagination settings
        $config['per_page'] = 5;
        $config['base_url'] = base_url() . 'feeds';
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['total_rows'] = $this->feed->getCountFeeds();
        //initializate the panination helper 
        $this->pagination->initialize($config);

        //limit end
        $page = $this->uri->segment(2);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0) {
            $limit_end = 0;
        }


        $data['feeds'] = $this->feed->getFeedsData($config['per_page'], $limit_end);

        
        $data['main_content'] = 'feeds';

        $this->load->view('template/template', $data);
    }

    public function addFeed() {
        if ($this->input->post()) {
            $config['upload_path'] = "./uploads/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100000;
            $config['max_width'] = 10240;
            $config['max_height'] = 7680;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('tt_image')) {
                $error = array('error' => $this->upload->display_errors());

                $data['main_content'] = 'add_feed';
                $data['categories'] = $this->category->getAllCategories();
                $data['error'] = $error;
                $this->load->view('template/template', $data);
            } else {
                $fdata = $this->input->post();
                $fdata['upload_data'] = $this->upload->data();
                if ($this->feed->saveFeed($fdata)) {
                    redirect('feeds/');
                }
            }
        }
        $data['main_content'] = 'add_feed';
        $data['categories'] = $this->category->getAllCategories();
        $this->load->view('template/template', $data);
    }

    public function deleteFeed() {

        $feed_id = $this->input->post("feed_id");
        $isDeleted = $this->feed->deleteFeed($feed_id);
        if ($isDeleted) {
            echo true;
        }
        echo false;
        exit;
    }

}
