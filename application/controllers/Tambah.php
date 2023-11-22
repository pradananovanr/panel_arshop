<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
		$this->load->model('user_model');
		$this->load->model('lisensi_model');
		$this->load->model('monitoring_model');
		$this->load->library('form_validation');

	}



	public function adduser()
	{
		check_admin();
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[user.username]',
        array('required' => '{field} Harus Diisi',
				'min_length' => '{field} Harus Berisi Minimal {param} Karakter',
				'max_length' => '{field} Maksimal {param} Karakter',
				'is_unique' => '{field} Sudah Ada. Gunakan {field} Lain'));
		$this->form_validation->set_rules('fullname', 'Name', 'required',
        array('required' => '{field} Harus Diisi'));
		
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]',
        array('required' => '{field} Harus Diisi',
				'is_unique' => '{field} Sudah Terdaftar. Silahkan Login/Gunakan Email Lain'));

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',
        array('required' => '{field} Harus Diisi',
				'min_length' => '{field} Harus Berisi Minimal {param} Karakter'));

		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
        array('required' => '{field} Harus Diisi',
				'matches' => 'Password Tidak Cocok'));

		$this->form_validation->set_rules('level', 'Level', 'required',
		array('required' => '{field} Harus Diisi'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template/template','tambahuser/addUser');
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
			$this->user_model->addUser($post);

			if($this->db->affected_rows() > 0) {
				?>
					<script>
						Swal.fire({
						title: 'Tambah Data Berhasil',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('daftar/listUser')?>';
						})
					</script>
				<?php
			}
		}
	}

	public function edituser($id)
	{
		check_admin();
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|callback_usernamecheck',
        array('required' => '{field} Harus Diisi',
				'min_length' => '{field} Harus Berisi Minimal {param} Karakter',
				'max_length' => '{field} Maksimal {param} Karakter'));
		$this->form_validation->set_rules('fullname', 'Name', 'required',
        array('required' => '{field} Harus Diisi'));
		
		if($this->input->post('email')) {
			$this->form_validation->set_rules('email', 'Email', 'callback_emailcheck');
		}

		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[6]',
			array('min_length' => '{field} Harus Berisi Minimal {param} Karakter'));

			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
			array('matches' => 'Password Tidak Cocok'));
		}

		if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
			array('matches' => 'Password Tidak Cocok'));
		}

		$this->form_validation->set_rules('level', 'Level', 'required',
		array('required' => '{field} Harus Diisi'));

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->user_model->getToken($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template','edituser/edit', $data);
			} else {
				?>
				
					<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/sweetalert2.min.css" id="theme-styles">
					<script src="<?=base_url()?>assets/assets/js/plugin/sweetalert/sweetalert2.min.js"></script>
					<style>
						body {
						font-family: 'Open Sans', sans-serif;
						}
					</style>
					<body></body>
					<script>
						Swal.fire({
						title: 'Data Tidak Ditemukan',
						icon: 'error',
						showConfirmButton: false,
						timer: 1000
						}).then((result) => {
							window.location='<?=site_url('daftar/listUser')?>';
						})
					</script>
				<?php
			}
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
			$this->user_model->editUser($post);

			if($this->db->affected_rows() > 0) {
				?>
					<script>
						Swal.fire({
						title: 'Edit Data Berhasil',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('daftar/listUser')?>';
						})
					</script>
				<?php
			}
		}
	}

	function emailcheck() {
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE email = '$post[email]' AND token != '$post[token]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('emailcheck', '{field} Sudah Terdaftar. Silahkan Gunakan Email Lain');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function usernamecheck() {
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND token != '$post[token]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('usernamecheck', '{field} Sudah Ada. Gunakan {field} Lain');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteuser($id)
	{
		check_admin();
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

		$query = $this->user_model->getToken($id);
		$this->user_model->deleteUser($id);
		if($this->db->affected_rows() > 0) {
			?>
				<script>
					Swal.fire({
					title: 'Data Berhasil Dihapus',
					icon: 'success',
					showConfirmButton: false,
					timer: 1500
					}).then((result) => {
						window.location='<?=site_url('daftar/listUser')?>';
					})
				</script>
			<?php
		
		}
	}
	
	public function tambahLisensi()
	{
		$this->form_validation->set_rules('code', 'Kode Lisensi', 'required|callback_lisensiaddcheck',
		array('required' => '{field} Harus Diisi'));

		$this->form_validation->set_rules('active_until', 'Aktif Hingga', 'required',
		array('required' => 'Kolom {field} Harus Diisi'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template/template','tambahlisensi/tambahlisensi');
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
			$this->lisensi_model->addLisensi($post);

			if($this->db->affected_rows() > 0) {
				?>
					<script>
						Swal.fire({
						title: 'Tambah Data Lisensi Berhasil',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('daftar/listlisensi')?>';
						})
					</script>
				<?php
			}
		}
	}
	
	public function editLisensi($id)
	{
		
		$this->form_validation->set_rules('code', 'Kode Lisensi', 'required|callback_lisensicheck',
		array('required' => '{field} Harus Diisi',
			'is_unique' => 'Lisensi Sudah Ada, Gunakan Kode Lain'));

		$this->form_validation->set_rules('active_until', 'Aktif Hingga', 'required',
		array('required' => 'Kolom {field} Harus Diisi'));

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->lisensi_model->getbyID($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template','editlisensi/edit', $data);
			} else {
				?>
				
					<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/sweetalert2.min.css" id="theme-styles">
					<script src="<?=base_url()?>assets/assets/js/plugin/sweetalert/sweetalert2.min.js"></script>
					<style>
						body {
						font-family: 'Open Sans', sans-serif;
						}
					</style>
					<body></body>
					<script>
						Swal.fire({
						title: 'Data Lisensi Tidak Ditemukan',
						icon: 'error',
						showConfirmButton: false,
						timer: 1000
						}).then((result) => {
							window.location='<?=site_url('daftar/listlisensi')?>';
						})
					</script>
				<?php
			}
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
			$this->lisensi_model->editLisensi($post);

			if($this->db->affected_rows() > 0) {
				?>
					<script>
						Swal.fire({
						title: 'Edit Data Lisensi Berhasil',
						icon: 'success',
						showConfirmButton: false,
						timer: 1500
						}).then((result) => {
							window.location='<?=site_url('daftar/listlisensi')?>';
						})
					</script>
				<?php
			} else redirect('daftar/listlisensi');
		}
	}

	function lisensicheck() {
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM code WHERE code = '$post[code]' AND id_code != '$post[id_code]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('lisensicheck', '{field} Sudah Ada. Gunakan {field} Lain');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function lisensiaddcheck() {
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM code WHERE code = '$post[code]' AND token = '$post[token]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('lisensiaddcheck', '{field} Sudah Ada. Gunakan {field} Lain');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteLisensi($id)
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

		$query = $this->lisensi_model->getbyID($id);
		$this->lisensi_model->deleteLisensi($id);
		if($this->db->affected_rows() > 0) {
			?>
				<script>
					Swal.fire({
					title: 'Data Lisensi Berhasil Dihapus',
					icon: 'success',
					showConfirmButton: false,
					timer: 1500
					}).then((result) => {
						window.location='<?=site_url('daftar/listlisensi')?>';
					})
				</script>
			<?php
		
		}
	}	
}
