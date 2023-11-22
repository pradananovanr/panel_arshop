<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

	public function statusakun()
	{
		$this->template->load('template/template','statusakun/statusakun');
	}
}
