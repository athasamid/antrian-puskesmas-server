<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Base_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m');
	}

	public function index()
	{
		redirect(base_url('auth_login'), 'auto', 301);
	}

	public function login(){
		if (isset($_SESSION['is_login'])&& $_SESSION['is_login'])
			redirect(base_url(), 'auto', 302);

		$this->load->view('auth/login', ['referer' => $this->session->flashdata('referer')]);
	}

	public function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->auth_m->do_login($username, $password);

		header('Content-type: application/json');

		if (isset($login->error)) {
			$output = json_encode($login);
		} else {
			$login->isLogin = true;
			$this->session->set_userdata((array) $login);
			$output = json_encode([
				'success' => true,
				'redirect' => base_url($this->input->post('referer')),
				//'nama' => $login['admin']->nama
			]);
		}

		echo $output;
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */