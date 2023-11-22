<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_login();
		$this->load->view('login/login');
	}

	public function process() {
		$post = $this->input->post(null,TRUE);
		if(isset($post['login'])) {
		$this->load->model('user_model');
		$query = $this->user_model->login($post);
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

			if($query->num_rows() > 0) {
				$row = $query->row();
				$nama = $row->fullname;				
				$params = array(
					'userid' => $row->id_user,
					'name' => $row->fullname,
					'level' => $row->level,
					'token' => $row->token
				);
				
				$this->session->set_userdata($params);

				if(isset($params)) {
				?>
					<script>
						Swal.fire({
						title: 'Login Berhasil!',
						text: 'Selamat Datang <?= $nama ?>',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then((result) => {
							window.location='<?=site_url('dashboard')?>';
						})
					</script>
				<?php
				}

			} else {
				?>
					<script>
						Swal.fire({
						title: 'Login Gagal!',
						text: 'Username dan/atau Password Salah',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then((result) => {
							window.location='<?=site_url('auth/login')?>';
						})
					</script>
				<?php
			}
		}
	}

	public function logout() {
		$params = array(
			'userid',
			'name',
			'level',
			'token'
		);

		$this->session->unset_userdata($params);
		if(isset($params)) {
		redirect('auth/login');
		}
	}
}
