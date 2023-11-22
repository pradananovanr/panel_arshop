<?php

function check_login() {
    $ci =& get_instance(); 
    $user_session = $ci->session->userdata('userid');

    if($user_session) {
        redirect('dashboard');
    }
}

function check_logout() {   
    $ci =& get_instance(); 
    $user_session = $ci->session->userdata('userid');

    if(!$user_session) {
        redirect('auth/login');
    }
}

function check_admin() {
    $ci =& get_instance(); 
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}