<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('apoteker_m');
	}

	public function index()
	{
		$title = 'Kelola Apoteker';
		$apoteker = $this->apoteker_m->getAll();
		$foot = $this->load->view('apoteker/indexjs', [], TRUE);
		$this->template->load('template', 'apoteker/index', compact('title', 'apoteker', 'foot'));
	}

	public function buat(){
		$title = 'Buat Apoteker';
		$foot = $this->load->view('apoteker/buatjs', [], TRUE);
		$this->template->load('template', 'apoteker/buat', compact('title', 'foot'));
	}

	public function edit($id){
		$title = "Ubah Admin";
		$foot = $this->load->view('apoteker/buatjs', [], TRUE); //Inject javascript di footer untuk halaman edit
		$apoteker = $this->apoteker_m->get($id);
		$this->template->load('template', 'apoteker/edit', compact('title', 'foot', 'apoteker'));
	}


	// Method Prosess

	public function do_buat(){
		$post = $this->input->post();

		$apoteker = $this->apoteker_m->buat($post);

		$output = [];
		if (!$apoteker)
			$output = ['error' => 'terjadi Kesalahan'];

		$output = ['success' => true, 'redirect' => base_url('apoteker')];

		header('application/json');
		echo json_encode($output);
	}

	public function do_delete($id){
		$delete = $this->apoteker_m->delete($id);

		$output = [];
		if (!$delete)
			$output = ['error' => 'Terjadi kesalahan!!'];

		$output = ['success' => true, 'redirect' => base_url('apoteker')];

		header('application/json');
		echo json_encode($output);
	}

	public function do_edit($id){
		$post = $this->input->post();

		$edit = $this->apoteker_m->edit($id, $post);

		$output = [];
		if (!$edit)
			$output = ['error' => 'Terjadi kesalahan!!'];

		$output = ['success' => true, 'redirect' => base_url('apoteker')];

		header('application/json');
		echo json_encode($output);
	}

}

/* End of file Apoteker.php */
/* Location: ./application/controllers/Apoteker.php */