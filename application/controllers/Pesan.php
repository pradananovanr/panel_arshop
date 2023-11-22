<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
		$this->load->model('user_model');
		$this->load->model('lisensi_model');
		$this->load->model('monitoring_model');
		$this->load->library('form_validation');
	}

	public function messages()
	{
		$this->form_validation->set_rules('method', 'Metode', 'required',
		array('required' => '{field} Harus Dipilih'));

		$this->form_validation->set_rules('list', 'Tujuan', 'required',
		array('required' => 'Kolom {field} Harus Dipilih'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template/template','pesan/pesan');
		}
		else
		{
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
			$this->lisensi_model->updateMessage($post);

			if($this->db->affected_rows() > 0) {
				?>
					<script>
						Swal.fire({
						title: 'Data Pesan Diupdate',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('pesan/messages')?>';
						})
					</script>
				<?php
			}
		}	}

	function get_ajax_account() {
    $method = $this->input->post('method');
    
		if($method == "account") {
			$this->load->model('monitoring_model');
			$token = $this->fungsi->user_login()->token;
			$data = $this->monitoring_model->getMonitoringbyToken($token);

			$lists = "<option value=''>-- Pilih Nomor Akun --</option>";
			foreach($data->result() as $result){
			$lists .= "<option value='".$result->id_monitoring."'>".$result->account_number."</option>";
			}
			
			$callback = array('list'=>$lists);
			echo json_encode($callback);
		}

		if($method == "license") {
			$this->load->model('lisensi_model');
			$token = $this->fungsi->user_login()->token;
			$data = $this->lisensi_model->getbyToken($token);

			$lists = "<option value=''>-- Pilih Lisensi EA --</option>";
			foreach($data->result() as $result){
			$lists .= "<option value='".$result->id_code."'>".$result->code."</option>";
			}
			
			$callback = array('list'=>$lists);
			echo json_encode($callback);
		}
	}
}