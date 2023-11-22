<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logger extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

    function get_ajax_logger() {
        $list = $this->logger_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
			$row[] = $item->server_time;
			$row[] = $item->terminal_time;
			$row[] = $item->log;
			$data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->logger_model->count_all(),
                    "recordsFiltered" => $this->logger_model->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
	}

	public function log()
	{
        $this->load->model('logger_model');
		$token = $this->fungsi->user_login()->token;
		$data['row'] = $this->logger_model->getLoggerbyToken($token);

		$this->template->load('template/template', 'logger/logger', $data);
	}
}