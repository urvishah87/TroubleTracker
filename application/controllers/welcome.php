<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->library('facebook');
        $this->load->helper('url');
        $this->load->model('user');
    }

    public function login() {

        // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
       
        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,email');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $this->user->checkUser($data['user_profile']);
            redirect('home/');
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('welcome/login'),
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('login', $data);
    }

    public function logout() {



        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        $this->session->sess_destroy();
        redirect('welcome/login');
    }

}
