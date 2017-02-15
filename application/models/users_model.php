<?php

class Users_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct("users", "user_id");
    }

    /*     * *
     * Checks that a users login is valid.
     * 
     * @param string $username  The username to check
     * @param string $password The users password in plain text
     * @returns - False if the login failed, the user object if login was successful.
     */

    function auth_login($username, $password) {
        // Ensure the users model is loaded.
        $ci = &get_instance();

        $this->db->select('u.*');
        $this->db->from('users u');
        $this->db->where('Username', $username);
        $this->db->where('Password', md5($password));
        $this->db->where('status', 1);

        $query = $this->db->get();

        // If there is no resulting row, return false
        if ($query->num_rows() <= 0) {
            return false;
        }

        $user = $query->row_array();

        $this->session->userdata($user);

        // All good - return the user object;
        return $user;
    }

    /*     * *
     * Checks to see if a user is currently logged in or not by 
     * checking their session data.
     * 
     * @returns true if the user has logged in, false if not.
     */

    public function is_logged_in() {
        $logged_in = false;

        $ci = &get_instance();

        $user_id = $this->session->userdata("user_id");
        if (!empty($user_id) && isset($user_id)) {
            $logged_in = true;
        }

        return $logged_in;
    }

}

?>
