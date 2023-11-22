<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

	public function index()
	{
		$ci =& get_instance();
		$ci->load->model('user_model');
		$this->template->load('template/template','dashboard/dashboard');
	}
}
