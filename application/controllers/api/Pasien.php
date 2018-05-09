<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_m');
	}
	
	public function index_get()
	{
		$id_masyarakat = $this->get('id_masyarakat');

		$pasien = $this->pasien_m->getPasien($id_masyarakat);

		$this->response($pasien);
	}

	public function index_post(){
		$inputs = $this->post();

		$inputs = [
			'nama' => $inputs['nama'],
			'alamat' => $inputs['alamat'],
			'kelamin' => $inputs['kelamin'], 
			'tgl_lahir' => $inputs['tgl_lahir'], 
			'tempat_lahir' => $inputs['tempat_lahir'], 
			'no_askes' => isset($inputs['no_askes']) ? $inputs['no_askes'] : null, 
			'no_telp' => $inputs['no_telp'],
			'id_masyarakat' => $inputs['id_masyarakat']
		];

		$pasien = $this->pasien_m->tambahPasien($inputs);

		$this->response(['success' => true, 'id_pasien' => $pasien]);
	}


}

/* End of file Pasien.php */
/* Location: ./application/controllers/api/Pasien.php */