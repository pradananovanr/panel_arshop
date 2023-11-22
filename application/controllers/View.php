<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function public($id)
	{
		$this->load->model('user_model');
		$query = $this->user_model->getbyToken($id);
        $isallowed = $query->row('apply_public');

		if($query->num_rows() > 0) {
            if($isallowed == 1) {
                $data['result'] = $query->row();
                $this->load->view('public/public', $data);
            } else $this->load->view('failed/disabled');
		} else $this->load->view('failed/404');
	}

	function get_ajax_monitoring() {
        $list = $this->monitoring_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
			$no++;
            $row = array();
            $row[] = $no.".";
			$row[] = $item->account_number;
			$row[] = $item->ea_name;
			$row[] = $item->ea_symbols;
			$row[] = $item->account_balance;
			$row[] = $item->account_equity;
			$row[] = $item->total_order;
			$row[] = $item->floating;
			$row[] = $item->drawdown;
			$row[] = $item->drawdown_percent;
			$row[] = $item->today_profit;
			$row[] = $item->total_profit;
			$row[] = $item->daily_profit;
			$row[] = $item->daily_percentage;
			$row[] = $item->daily_romad;
			$data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->monitoring_model->count_all(),
                    "recordsFiltered" => $this->monitoring_model->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
	}
}
