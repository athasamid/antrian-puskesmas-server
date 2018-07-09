<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_m extends CI_Model {
	public function getPasien($id_masyarakat = null){
		$this->db->select('id, nama, alamat, kelamin, tgl_lahir, tempat_lahir, no_askes, no_telp');
		
		if ($id_masyarakat != null)
			$this->db->where('id_masyarakat', $id_masyarakat);

		return $this->db->get('pasien')->result();
	}

	public function tambahPasien($data){
		$this->db->insert('pasien', $data);
		return $this->db->insert_id();
	}

	public function get($id){
		$this->db->select('id, nama, alamat, kelamin, tgl_lahir, tempat_lahir, no_askes, no_telp');
		$this->db->where('id', $id);
		return $this->db->get('pasien')->row();
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('pasien');
	}

	public function update($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('pasien', $data);
	}
}

/* End of file Pasien_m.php */
/* Location: ./application/models/Pasien_m.php */