<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_m extends CI_Model {
	public function getPoli(){
		$this->db->select('id, nama, icon');
		$output = $this->db->get('poli')->result();

		return $output;
	}

	public function get($id){
		$this->db->select('id, nama, icon');
		$this->db->where('id', $id);
		$output = $this->db->get('poli')->row();

		return $output;
	}

	public function buat($data){
		$this->db->insert('poli', $data);
		return $this->db->insert_id();
	}

	public function edit($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('poli', $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('poli');
	}
}

/* End of file Poli_m.php */
/* Location: ./application/models/Poli_m.php */