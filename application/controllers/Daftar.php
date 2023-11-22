<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_logout();
	}

	function get_ajax_user() {
        $list = $this->user_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
			$no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->username;
            $row[] = $item->fullname;
            $row[] = $item->email;
            $row[] = '<button onclick="Swal.fire({
									title: \''.$item->username.'\',
									text: \''.$item->token.'\',
									icon: \'info\',
									});" class="btn btn-primary btn-round">
					<i class="fa fa-edit"></i>
					Show
					</button>';
			$row[] = $item->level == 1 ? "Admin" : "User";
            // add html for action
            $row[] = '<div class="form-button-action"><a href="'.site_url('tambah/edituser/').$item->token.'" title="Edit" class="btn btn-link btn-lg"><i class="fa fa-edit"></i></a>
                <input type="hidden" name="token" value="'.$item->token.'">
                <a href="'.site_url('tambah/deleteuser/').$item->token.'" id="deleteuser" title="Remove" class="btn btn-link btn-danger"><i class="fa fa-trash"></i></a></div>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->user_model->count_all(),
                    "recordsFiltered" => $this->user_model->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
	}

	function get_ajax_lisensi() {
        $list = $this->lisensi_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
			$no++;
            $row = array();
			$row[] = $no.".";
            $row[] = $item->code;
            $row[] = $item->active_until;
            // add html for action
            $row[] = '<div class="form-button-action">
            <a href="'.site_url('tambah/editLisensi/').$item->id_code.'" title="Edit" class="btn btn-link btn-lg"><i class="fa fa-edit"></i></a>
			<input type="hidden" name="id_pengguna" value="'.$item->id_code.'">
			<a href="'.site_url('tambah/deleteLisensi/').$item->id_code.'" id="deleteuser" title="Remove" class="btn btn-link btn-danger"><i class="fa fa-trash"></i></a></div>';
		    $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->lisensi_model->count_all(),
                    "recordsFiltered" => $this->lisensi_model->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
	}

	public function listUser()
	{
		check_admin();
		$this->load->model('user_model');
		$data['row'] = $this->user_model->get();

		$this->template->load('template/template','daftaruser/list', $data);
	}

	public function listlisensi()
	{
		$this->load->model('lisensi_model');
		$token = $this->fungsi->user_login()->token;
		$data['row'] = $this->lisensi_model->getbyToken($token);

		$this->template->load('template/template','listlisensi/list', $data);
	}


}
