<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}
}