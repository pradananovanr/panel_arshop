<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

	public function ubahstatus()
	{
		$this->template->load('template/template','ubahstatus/ubahstatus');
	}
}
