<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('backend/login');
	}

	public function auth() {
		$row = $this->db->get_where('admintable', array('right' => 1, 'acc' => $this->input->get('acc'), ))->row_array();
		$loginPage = site_url('backend/login');
		if (empty($row)) {
			echo '
			<script>
				alert("無此帳號。");
				window.location.href = "'.$loginPage.'";
			</script>';
			exit;
		}

		if ($row['pwd'] != md5($this->input->get('pwd'))) {
			echo '
			<script>
				alert("密碼錯誤。");
				window.location.href = "'.$loginPage.'";
			</script>';
			exit;
		}

		$this->load->view('backend/layout/auth');

		$this->session->set_userdata('manage', $row);
		$row=select_submenu(1);
		redirect($row["link"], 'refresh');
	}

}

