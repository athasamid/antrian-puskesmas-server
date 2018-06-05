<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends Base_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('poli_m');
	}

	public function index()
	{
		$poli = $this->poli_m->getPoli();		
		$title = "Kelola Poli";
		$foot = $this->load->view('poli/indexjs', [], TRUE);
		$this->template->load('template', 'poli/index', compact('poli', 'title', 'foot'));
	}

	public function buat(){
		$title = 'Buat Poli';
		$foot = $this->load->view('poli/buatjs', [], TRUE);
		$this->template->load('template', 'poli/buat', compact('title', 'foot'));
	}

	public function edit($id){
		$title = "Ubah Admin";
		$foot = $this->load->view('poli/buatjs', [], TRUE); //Inject javascript di footer untuk halaman edit
		$poli = $this->poli_m->get($id);
		$this->template->load('template', 'poli/edit', compact('title', 'foot', 'poli'));
	}

	public function do_buat(){
		$post = $this->input->post();

		$config = [
			'upload_path' => './images/',
			'allowed_types' => 'jpg|png',
			'max_size' => 100
		];

		$this->load->library('upload', $config);

		$output = [];
		if (!$this->upload->do_upload('gambar')) {
			$output = ['error' => 'Terjadi kesalahan'];
		} else {
			$data = [
				'nama' => $post['nama'],
				'icon' => 'images/'.$this->upload->data()['file_name']
			];

			$this->poli_m->buat($data);

			$output = ['success' => true, 'redirect' => base_url('poli')];
		}

		header('application/json');
		echo json_encode($output);
	}

	public function do_edit($id){
		$data = ['nama' => $this->input->post('nama')];

		$output = [];

		$config = [
			'upload_path' => './images/',
			'allowed_types' => 'jpg|png',
			'max_size' => 100
		];

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$output = ['error' => 'Terjadi kesalahan'];
		} else {
			$data['icon'] = 'images/'.$this->upload->data()['file_name'];
		}

		$this->poli_m->edit($id, $data);

		$output = ['success' => true, 'redirect' => base_url('poli')];

		header('application/json');
		echo json_encode($output);
	}

	public function do_delete($id) {
		$delete = $this->poli_m->delete($id);

		$output = [];
		if (!$delete)
			$output = ['error' => 'Terjadi kesalahan!!'];

		$output = ['success' => true, 'redirect' => base_url('poli')];

		header('application/json');
		echo json_encode($output);
	}
}

/* End of file Poli.php */
/* Location: ./application/controllers/Poli.php */