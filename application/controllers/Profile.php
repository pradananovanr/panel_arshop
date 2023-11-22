<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

	public function my()
	{
		check_logout();
		$this->load->model('user_model');
		
		$this->template->load('template/template','profile/profile');
	}
}