<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker_m extends CI_Model {
	public function getAll(){
		$this->db->select('a.id, nama, alamat, no_hp, username, email');
		$this->db->join('user u', 'u.jenis_pemilik = \'apoteker\' AND u.id_pemilik = a.id');
		return $this->db->get('apoteker a')->result();
	}

	public function get($id){
		$this->db->select('a.id, nama, alamat, no_hp, username, email');
		$this->db->join('user u', 'u.jenis_pemilik = \'apoteker\' AND u.id_pemilik = a.id');
		$this->db->where('a.id', $id);
		return $this->db->get('apoteker a')->row();
	}

	public function edit($id, $data){
		$apoteker = [
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'no_hp' => $data['no_telp'],
			'email' => $data['email']
		];

		$this->db->where('id', $id);
		$apoteker = $this->db->update('apoteker', $apoteker);

		if (!empty($data['password'])) {
			$user = ['password' => password_hash($data['password'], PASSWORD_BCRYPT)];
			$this->db->where(['id_pemilik' => $id, 'jenis_pemilik' => 'apoteker']);
			$this->db->update('user', $user);
		}

		return $apoteker;
	}

	public function buat($data){
		$user = [
			'username' => $data['username'],
			'password' => password_hash($data['password'], PASSWORD_BCRYPT)
		];

		$data = [
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'no_hp' => $data['no_telp'],
			'email' => $data['email']
		];

		$this->db->insert('apoteker', $data);
		$apoteker_id = $this->db->insert_id();

		$user['id_pemilik'] = $apoteker_id;
		$user['jenis_pemilik'] = 'apoteker';

		$this->db->insert('user', $user);
		$user_id = $this->db->insert_id();

		return $user_id && $apoteker_id;
	}

	public function delete($id){
		$this->db->where('id', $id);
		$apoteker = $this->db->delete('apoteker');

		$this->db->where(['id_pemilik' => $id,  'jenis_pemilik' => 'apoteker']);
		$user = $this->db->delete('user');

		return $user && $apoteker;
	}
}

/* End of file Apoteker_m.php */
/* Location: ./application/models/Apoteker_m.php */