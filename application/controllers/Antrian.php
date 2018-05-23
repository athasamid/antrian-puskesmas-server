<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['poli_m', 'antrian_m']);
	}

	public function index()
	{
		$poli = array_chunk($this->poli_m->getPoli(), 3);
		$title = 'Antrian';
		$this->template->load('template', 'antrian/antrian', compact('poli', 'title'));
	}

	public function proses($id){
		$poli = $this->poli_m->get($id);
		$title = 'Proses Antrian';
		$antrian = $this->antrian_m->panggil($id, true);
		$foot = $this->load->view('antrian/prosesjs', compact('poli', 'antrian'), TRUE);
		$this->template->load('template', 'antrian/proses', compact('poli', 'title', 'foot', 'antrian'));
	}

	public function buat(){
		$poli = array_chunk($this->poli_m->getPoli(), 4);
		$this->load->view('antrian/buat', compact('poli'));
	}

	public function do_buat($id){
		$antrian = $this->antrian_m->buatManual($id);
		header('application/json');
		echo json_encode($antrian);
	}

	public function panggil($id_poli){

		$panggil = $this->antrian_m->panggil($id_poli);

		// Todo Send notifikasi

		header('application/json');
		echo json_encode($panggil);
	}

}

/* End of file Antrian.php */
/* Location: ./application/controllers/Antrian.php */