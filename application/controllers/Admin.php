<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
	}

	/**
	 * [tampilkan list data admin]
	 * @return [view] [tampilan tabel dari admin]
	 */
	public function index()
	{
		$admin = $this->admin_m->getAll();
		$title = "Kelola Admin";
		$foot = $this->load->view('admin/adminjs', [], TRUE);
		$this->template->load('template', 'admin/admin', compact('admin', 'title', 'foot'));
	}

	public function buat(){
		$title = "Buat Admin";
		$foot = $this->load->view('admin/buatjs', [], TRUE); //Inject javascript di footer untuk halaman buat
		$this->template->load('template', 'admin/buat', compact('title', 'foot'));
	}

	public function edit($id){
		$title = "Ubah Admin";
		$foot = $this->load->view('admin/buatjs', [], TRUE); //Inject javascript di footer untuk halaman edit
		$admin = $this->admin_m->get($id);
		$this->template->load('template', 'admin/edit', compact('title', 'foot', 'admin'));
	}


	// Method Prosess

	public function do_buat(){
		$post = $this->input->post();

		$admin = $this->admin_m->buat($post);

		$output = [];
		if (!$admin)
			$output = ['error' => 'terjadi Kesalahan'];

		$output = ['success' => true, 'redirect' => base_url('admin')];

		header('application/json');
		echo json_encode($output);
	}

	public function do_delete($id){
		$delete = $this->admin_m->delete($id);

		$output = [];
		if (!$delete)
			$output = ['error' => 'Terjadi kesalahan!!'];

		$output = ['success' => true, 'redirect' => base_url('admin')];

		header('application/json');
		echo json_encode($output);
	}

	public function do_edit($id){
		$post = $this->input->post();

		$edit = $this->admin_m->edit($id, $post);

		$output = [];
		if (!$edit)
			$output = ['error' => 'Terjadi kesalahan!!'];

		$output = ['success' => true, 'redirect' => base_url('admin')];

		header('application/json');
		echo json_encode($output);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */