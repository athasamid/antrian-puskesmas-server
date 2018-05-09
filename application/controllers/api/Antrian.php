<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('antrian_m');
	}

	public function index_get($id = null)
	{
		$user = $this->get('id_user');

		if ($id) 
			$antrian = $this->antrian_m->get($id);
		else 
			$antrian = $this->antrian_m->lihat($user);

		$this->response($antrian);
	}

	public function index_post()
	{
		$inputs = $this->post();

		$antrian = $this->antrian_m->buat($inputs);

		$this->response($antrian);
	}

}

/* End of file Antrian.php */
/* Location: ./application/controllers/api/Antrian.php */