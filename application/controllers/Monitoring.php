<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
		$this->load->library('form_validation');
	}

	function get_ajax_monitoring() {
        $list = $this->monitoring_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
			$no++;
            $row = array();
            $row[] = $no.".";
			$row[] = '<a href="' . site_url('monitoring/details/' . $item->id_monitoring) . '">' . $item->account_number . '</a>';
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
			$row[] = $item->ea_day_trade;
			$row[] = $item->daily_profit;
			$row[] = $item->daily_percentage;
			$row[] = $item->daily_romad;
            // add html for action
            //$row[] = '<div class="form-button-action"><a href="'.site_url('monitoring/details/').$item->id_monitoring.'" title="More Details" class="btn btn-link btn-lg"><i class="fa fa-info"></i></a></div>';
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

	public function monitor()
	{
		$this->load->model('monitoring_model');
		$token = $this->fungsi->user_login()->token;
		$data['row'] = $this->monitoring_model->getMonitoringbyToken($token);

		$this->template->load('template/template','monitoringakun/monitor', $data);
	}

	public function details($id)
	{
		$this->load->model('monitoring_model');
		$query = $this->monitoring_model->getMonitoringbyID($id);
		if($query->num_rows() > 0) {
			$data['row'] = $query->row();
			$this->template->load('template/template','monitoringakun/details', $data);
		}
	}

	public function public()
	{
		$this->load->model('user_model');
		$token = $this->fungsi->user_login()->token;
		$query = $this->user_model->getToken($token);

		if($query->num_rows() > 0) {
			$data['row'] = $query->row();
			$this->template->load('template/template','monitoringakun/public', $data);
		}
	}

	function update_public() {
		?>
		<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/sweetalert2.min.css" id="theme-styles">
		<script src="<?=base_url()?>assets/assets/js/plugin/sweetalert/sweetalert2.min.js"></script>
		<style>
			body {
			font-family: 'Open Sans', sans-serif;
			}
		</style>
		<body></body>
		<?php

		$post = $this->input->post(null, TRUE);
		$this->user_model->updateApply($post);

		if($this->db->affected_rows() > 0) {
			if($post['apply_public'] == 1) {
				?>
					<script>
						Swal.fire({
						title: 'Link Public Aktif',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('monitoring/public')?>';
						})
					</script>
				<?php
			}

			if($post['apply_public'] == 0) {
				?>
					<script>
						Swal.fire({
						title: 'Link Public Nonaktif',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('monitoring/public')?>';
						})
					</script>
				<?php
			}
		}
	}
}
