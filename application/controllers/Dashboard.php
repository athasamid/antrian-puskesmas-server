<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->template->load('template', 'dashboard', ['title' => 'Antrian Puskesmas']);	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */