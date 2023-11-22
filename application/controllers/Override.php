<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Override extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

	public function overrideakun()
	{
		$this->template->load('template/template','override/overrideakun');
	}
}
