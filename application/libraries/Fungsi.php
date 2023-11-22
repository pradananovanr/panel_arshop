<?php

Class Fungsi {
    protected $ci;

    function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_model');
        $userid = $this->ci->session->userdata('userid');
        $userdata = $this->ci->user_model->get($userid)->row();
        return $userdata;
    }
}