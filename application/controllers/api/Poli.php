<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('poli_m');
	}

	public function index_get()
	{
		$poli = $this->poli_m->getPoli();

		foreach ($poli as $row) {
			$row->icon = base_url($row->icon);
		}

		$this->response($poli);
	}
}

/* End of file Poli.php */
/* Location: ./application/controllers/api/Poli.php */