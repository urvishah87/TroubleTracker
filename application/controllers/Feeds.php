<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feeds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->user->is_logged_in()) {
            redirect("welcome/login");
        }
        $this->load->model('feed');
        $this->load->model('category');
    }

    public function index() {

        $data['feeds'] = $this->feed->getFeedsData();

        $data['main_content'] = 'feeds';

        $this->load->view('template/template', $data);
    }

    public function addFeed() {
        if ($this->input->post()) {
            $fdata = $this->input->post();
            $config['upload_path'] = "./uploads/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (isset($_FILES["tt_image"]) && !$this->upload->do_upload('tt_image')) {
                $error = array('error' => $this->upload->display_errors());

                $data['main_content'] = 'add_feed';
                $data['categories'] = $this->category->getAllCategories();
                $data['error'] = $error;
                $this->load->view('template/template', $data);
            } else {

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
