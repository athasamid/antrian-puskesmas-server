<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m');
	}

	public function auth_post()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->auth_m->do_login($username, $password, true);


		$this->response($login);
	}

	public function register_post(){
		$inputs = $this->post();
		$register = $this->auth_m->do_register($inputs);

		//if (isset($register['success']))
			// Todo send emai verification
			
		$this->response($register);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/api/User.php */